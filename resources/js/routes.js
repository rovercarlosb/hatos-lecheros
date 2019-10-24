import AdminLayout from './layouts/AdminLayout.vue';
import LoginPage from './pages/auth/LoginPage.vue';
import UsersPage from './pages/users/UsersPage';

const routes = [
	{
		path: '/',
		redirect: '/login'
	},

	{
		path: '/login',
		name: 'Login',
		component: LoginPage,
		meta: {

			auth: false
		}

	},

	{
		path: '/home',
		name: 'Dashboard',
		component: AdminLayout,
		meta: {
			auth: true
		},
	},

	{
		path: '/users',
		name: 'Users',
		component: UsersPage

	}
];

export default routes;