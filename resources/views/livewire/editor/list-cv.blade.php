<div>
	<div class="container mt-5">
		<table class="table table-striped table-hover">
			<thead class="thead-dark">
			<tr>
				<th>ID</th>
				<th>Nume</th>
				<th>Email</th>
				<th>Data creării</th>
				<th class="text-end">Acțiuni</th>
			</tr>
			</thead>
			<tbody>
			@foreach ($cvs as $cv)
				<tr>
					<td>{{ $cv->id }}</td>
					<td>{{ $cv->nume }}</td>
					<td>{{ $cv->email }}</td>
					<td>{{ $cv->created_at }}</td>
					<td class="text-end">
						<a href="{{ route('cv.edit', $cv->id) }}" class="btn btn-primary">
							<i class="bx bx-edit"></i> Editează
						</a>
						<a href="{{ route('cv.view', $cv->id) }}" class="btn btn-success">
							<i class="bx bx-show"></i> Vizualizează
						</a>
						<a href="{{ route('cv.destroy', $cv->id) }}" class="btn btn-danger btn-delete">
							<i class="bx bx-trash"></i> Șterge
						</a>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
</div>

@section('page-script')
	<script>
		$(document).ready(function () {
			$('a.btn-delete').on('click', function (e) {
				e.preventDefault();
				let url = $(this).attr('href');
				Swal.fire({
					title: 'Sunteți sigur?',
					text: "Nu veți putea recupera CV-ul după ștergere!",
					icon: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					cancelButtonText: 'Anulează',
					confirmButtonText: 'Da, șterge!'
				}).then((result) => {
					if (result.isConfirmed) {
						window.location.href = url;
					}
				})
			});
		});
	</script>
@endsection
