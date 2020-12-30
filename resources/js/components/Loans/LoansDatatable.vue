<template>
  <div class="loans">
    <div class="tableFilters">
      <input
        class="input"
        type="text"
        v-model="search"
        placeholder="Search Table"
        @input="resetPagination()"
      />

      <div class="control">
        <div class="select">
          <select v-model="length" @change="resetPagination()">
            <option value="10">10</option>
            <option value="20">20</option>
            <option value="30">30</option>
          </select>
        </div>
      </div>
    </div>
    <datatable
      :columns="columns"
      :sortKey="sortKey"
      :sortOrders="sortOrders"
      @sort="sortBy"
    >
      <tbody>
        <tr v-for="project in paginated" :key="project.id">
          <td>{{ project.deadline }}</td>
          <td>{{ project.budget }}</td>
          <td>{{ project.status }}</td>
        </tr>
      </tbody>
    </datatable>
    <pagination
      :pagination="pagination"
      :client="true"
      :filtered="filteredLoans"
      @prev="--pagination.currentPage"
      @next="++pagination.currentPage"
    >
    </pagination>
  </div>
</template>

<script>
import Datatable from "../Datatable/Table";
import Pagination from "../Datatable/Pagination";

export default {
  components: { datatable: Datatable, pagination: Pagination },
  created() {
    this.getProjects();
  },
  data() {
    let sortOrders = {};
    let columns = [
      {
        width: "33%",
        label: "Loan Number",
        name: "loan_number",
        type: "number",
      },
      { width: "33%", label: "Lender", name: "lender", type: "string" },
      { width: "33%", label: "Customer", name: "customer" },
    ];
    columns.forEach((column) => {
      sortOrders[column.name] = -1;
    });
    return {
      loans: [],
      columns: columns,
      sortKey: "deadline",
      sortOrders: sortOrders,
      length: 10,
      search: "",
      tableData: {
        client: true,
      },
      pagination: {
        currentPage: 1,
        total: "",
        nextPage: "",
        prevPage: "",
        from: "",
        to: "",
      },
    };
  },
  methods: {
    getProjects(url = "/loans") {
      axios
        .get(url, { params: this.tableData })
        .then((response) => {
          this.loans = response.data;
          this.pagination.total = this.loans.length;
        })
        .catch((errors) => {
          console.log(errors);
        });
    },
    paginate(array, length, pageNumber) {
      this.pagination.from = array.length ? (pageNumber - 1) * length + 1 : " ";
      this.pagination.to =
        pageNumber * length > array.length ? array.length : pageNumber * length;
      this.pagination.prevPage = pageNumber > 1 ? pageNumber : "";
      this.pagination.nextPage =
        array.length > this.pagination.to ? pageNumber + 1 : "";
      return array.slice((pageNumber - 1) * length, pageNumber * length);
    },
    resetPagination() {
      this.pagination.currentPage = 1;
      this.pagination.prevPage = "";
      this.pagination.nextPage = "";
    },
    sortBy(key) {
      this.resetPagination();
      this.sortKey = key;
      this.sortOrders[key] = this.sortOrders[key] * -1;
    },
    getIndex(array, key, value) {
      return array.findIndex((i) => i[key] == value);
    },
  },
  computed: {
    filteredLoans() {
      let loans = this.loans;
      if (this.search) {
        loans = loans.filter((row) => {
          return Object.keys(row).some((key) => {
            return (
              String(row[key])
                .toLowerCase()
                .indexOf(this.search.toLowerCase()) > -1
            );
          });
        });
      }
      let sortKey = this.sortKey;
      let order = this.sortOrders[sortKey] || 1;
      if (sortKey) {
        loans = loans.slice().sort((a, b) => {
          let index = this.getIndex(this.columns, "name", sortKey);
          a = String(a[sortKey]).toLowerCase();
          b = String(b[sortKey]).toLowerCase();
          if (this.columns[index].type && this.columns[index].type === "date") {
            return (
              (a === b
                ? 0
                : new Date(a).getTime() > new Date(b).getTime()
                ? 1
                : -1) * order
            );
          } else if (
            this.columns[index].type &&
            this.columns[index].type === "number"
          ) {
            return (+a === +b ? 0 : +a > +b ? 1 : -1) * order;
          } else {
            return (a === b ? 0 : a > b ? 1 : -1) * order;
          }
        });
      }
      return loans;
    },
    paginated() {
      return this.paginate(
        this.filteredLoans,
        this.length,
        this.pagination.currentPage
      );
    },
  },
};
</script>