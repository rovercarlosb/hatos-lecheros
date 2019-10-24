const crudMixin = {
	created() {
		this.$bus.$on("register", () => {
			this.register();
		});

		this.$bus.$on("edit", () => {
			this.edit(this.updateUrl);
		});

		this.$bus.$on("clear", () => {
			this.resetForm();
		});
	},

	methods: {
		
		register() {
			
		},

		edit(url) {
			let id = this.form.id;
			let endpoint = `${url}/${id}`;

			this.axios
				.put(endpoint, this.form)
				.then(response => {
					swal(
						"Exelente",
						"registro modificado correctamente",
						"success"
					).then(value => {
						reload();
					});
				})
				.catch(error => {
					swal("Error", "Error al editar", "error");
				});
		},

		delete(url) {
			let id = this.form.id;
			let endpoint = `${url}/${id}`;

			swal({
				title: "Seguro quieres eliminar este item?",
				text: "una vez borrado, no podras recuperar el registro!",
				icon: "warning",
				buttons: true,
				dangerMode: true
			}).then(willDelete => {
				if (willDelete) {
					axios
						.delete(endpoint)
						.then(() => {
							swal("Tu registro ha sido borrado!", {
								icon: "success"
							}).then(value => {
								reload();
							});
						})
						.catch(error => {
							swal("Tu registro no pudo ser borrado!", {
								icon: "error"
							});
						});
				} else {
					return;
				}
			});
		},

	}
};

export default crudMixin;
