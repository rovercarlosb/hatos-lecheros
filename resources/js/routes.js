import HomePage from "./pages/HomePage.vue";
import LoginPage from "./pages/auth/LoginPage.vue";
import UsersPage from "./pages/users/UsersPage";
import EmployeesPage from "./pages/employees/EmployeesPage";
import CowsPage from "./pages/cows/CowsPage";
import VaccinesPage from "./pages/vaccines/VaccinesPage";
import ExtractionsPage from "./pages/extractions/ExtractionsPage";
import StadisticsPage from './pages/stadistics/StadisticsPage';

const routes = [
	{
		path: "/",
		redirect: "/login"
	},

	{
		path: "/login",
		name: "Login",
		component: LoginPage,
		meta: {
			auth: false
		}
	},

	{
		path: "/home",
		name: "Dashboard",
		component: HomePage,
		meta: {
			auth: true
		}
	},

	{
		path: "/users",
		name: "Users",
		component: UsersPage,
		meta: {
			auth: true
		}
	},

	{
		path: "/employees",
		name: "Employees",
		component: EmployeesPage,
		meta: {
			auth: true
		}
	},

	{
		path: "/cows",
		name: "Cows",
		component: CowsPage,
		meta: {
			auth: true
		}
	},

	{
		path: "/vaccines",
		name: "Vaccines",
		component: VaccinesPage,
		meta: {
			auth: true
		}
	},

	{
		path: "/extractions",
		name: "Extractions",
		component: ExtractionsPage,
		meta: {
			auth: true
		}
	},

	{
		path: "/stadistics",
		name: "Stadistics",
		component: StadisticsPage,
		meta: {
			auth: true
		}
	}


];

export default routes;
