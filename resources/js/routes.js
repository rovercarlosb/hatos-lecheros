import AdminLayout from './layouts/AdminLayout.vue';
import LoginPage from './pages/auth/LoginPage.vue';

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
		}

	}
];

export default routes;