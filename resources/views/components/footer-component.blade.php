<!-- resources/views/components/footer-component.blade.php -->
<footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="//cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable();
    });

    // Fungsi untuk menampilkan SweetAlert dengan konfigurasi dinamis
    function showConfirmationDialog(actionType, form = null) {
      let config = {};

      switch (actionType) {
        case 'delete':
          config = {
            title: 'Are you sure?',
            text: 'This action cannot be undone!',
            icon: 'warning',
            confirmButtonText: 'Yes, delete it!',
            confirmButtonColor: '#d33',
            showCancelButton: true,
            cancelButtonColor: '#3085d6'
          };
          break;
        
        case 'edit':
          config = {
            title: 'Edit Confirmation',
            text: 'Are you sure you want to edit this item?',
            icon: 'info',
            confirmButtonText: 'Yes, edit it!',
            confirmButtonColor: '#3085d6',
            showCancelButton: true,
            cancelButtonColor: '#d33'
          };
          break;

        case 'success':
          config = {
            title: 'Success!',
            text: 'Action completed successfully!',
            icon: 'success',
            confirmButtonText: 'OK',
            confirmButtonColor: '#3085d6'
          };
          break;

        // Tambahkan aksi lain sesuai kebutuhan
        default:
          config = {
            title: 'Notification',
            text: 'Action is in progress.',
            icon: 'info',
            confirmButtonText: 'OK',
            confirmButtonColor: '#3085d6'
          };
          break;
      }

      Swal.fire(config).then((result) => {
        if (result.isConfirmed && form) {
          form.submit(); // Submit form jika dikonfirmasi
        }
      });
    }

    // Event untuk tombol delete
    document.querySelectorAll('.btn-delete').forEach(button => {
      button.addEventListener('click', function(event) {
        event.preventDefault();
        const form = this.closest('form');
        showConfirmationDialog('delete', form);
      });
    });

    // Event untuk tombol edit atau aksi lainnya (contoh)
    document.querySelectorAll('.btn-edit').forEach(button => {
      button.addEventListener('click', function(event) {
        event.preventDefault();
        showConfirmationDialog('edit');
      });
    });
  </script>
</footer>
    