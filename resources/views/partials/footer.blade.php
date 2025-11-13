 <footer class="footer">
     <div class="container-fluid d-flex justify-content-center">
         <div class="copyright">
             2025 © Kredifyloans Services Pvt. Ltd. All rights reserved.
         </div>
     </div>
 </footer>

 @push('scripts')
     @if (session('success'))
         <script>
             swal("Success", "{{ session('success') }}", {
                 icon: "success",
                 buttons: {
                     confirm: {
                         className: "btn btn-success"
                     }
                 }
             });
         </script>
     @endif

     @if (session('error'))
         <script>
             swal("Oops...", "{{ session('error') }}", {
                 icon: "error",
                 buttons: {
                     confirm: {
                         className: "btn btn-danger"
                     }
                 }
             });
         </script>
     @endif

     @if ($errors->any())
         <script>
             swal("Validation Error", `{!! implode('<br>', $errors->all()) !!}`, {
                 icon: "warning",
                 buttons: {
                     confirm: {
                         className: "btn btn-warning"
                     }
                 }
             });
         </script>
     @endif
 @endpush
