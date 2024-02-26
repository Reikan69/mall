<script src="<?= $GLOBALS['assets'] ?>js/lib/jquery.min.js"></script>
<script src="<?= $GLOBALS['assets'] ?>js/lib/bootstrap.bundle.min.js"></script>
<script src="<?= $GLOBALS['assets'] ?>js/lib/slick.min.js"></script>
<script src="<?= $GLOBALS['assets'] ?>js/lib/apexcharts.min.js"></script>
<script src="<?= $GLOBALS['assets'] ?>js/lib/jquery.nice-select.min.js"></script>
<script src="<?= $GLOBALS['assets'] ?>js/lib/moment.min.js"></script>
<script src="<?= $GLOBALS['assets'] ?>js/lib/jquery.daterangepicker.min.js"></script>
<script src="<?= $GLOBALS['assets'] ?>js/lib/jquery.richtext.min.js"></script>
<script src="<?= $GLOBALS['assets'] ?>js/lib/jquery.tagify.min.js"></script>
<script src="<?= $GLOBALS['assets'] ?>js/lib/wNumb.js"></script>
<script src="<?= $GLOBALS['assets'] ?>js/lib/nouislider.min.js"></script>
<script src="<?= $GLOBALS['assets'] ?>js/lib/quill.core.js"></script>
<script src="<?= $GLOBALS['assets'] ?>js/charts.js"></script>
<script src="<?= $GLOBALS['assets'] ?>js/app.js"></script>
<!-- <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/ckeditor5-build-classic-base64-upload@27.0.2/build/ckeditor.min.js"></script>
<script src="./node_modules/ckeditor5-build-classic-base64-upload/build/ckeditor.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
$(function() {
  $('#js-daterangepick').daterangepicker({
    timePicker: true,
    locale: {
      format: 'MMMM DD, YYYY hh:mm A'
    }
  });
});
</script>

<script>
 // Wait for the DOM content to be fully loaded
    document.addEventListener('DOMContentLoaded', function () {
        var editor = document.getElementById('editor');
        var editorContentInput = document.getElementById('editorContent');
        
        // Initialize CKEditor
        ClassicEditor.create(editor)
            .then(editor => {
                // Listen for changes in the editor content
                editor.model.document.on('change:data', () => {
                    // Update the hidden input field with the editor content
                    editorContentInput.value = editor.getData();
                });
            })
            .catch(error => {
                console.error(error);
            });
    });
</script>

<script type="text/javascript">
function DateTime(selectedDate, selectedTime) {
    var value = new Date(selectedDate + ' ' + selectedTime);

    var year = value.getFullYear();
    var month = ("0" + (value.getMonth() + 1)).slice(-2);
    var day = ("0" + value.getDate()).slice(-2);

    var hours = ("0" + value.getHours()).slice(-2);
    var minutes = ("0" + value.getMinutes()).slice(-2);
    var seconds = ("0" + value.getSeconds()).slice(-2);

    var valueString = year + "-" + month + "-" + day + " " + hours + ":" + minutes + ":" + seconds;

    return valueString;
}
</script>
<script type="text/javascript">
    function openModal() {
        var modal = new bootstrap.Modal(document.getElementById('modal-datepicker'));
        modal.show();
    }
    function closeModal() {
       document.querySelector('.action-body').classList.toggle('d-none');
    }

    function handleReschedule() {
        var selectedDate = document.querySelector('.js-date-range').value;
        var selectedTime = document.querySelector('.datepicker-time').value;

        var formattedDate = DateTime(selectedDate, selectedTime);
        document.getElementById('datepick').value = selectedDate + ' ' +selectedTime;
        document.getElementById('datepickValue').value = formattedDate;
        var modal = bootstrap.Modal.getInstance(document.getElementById('modal-datepicker'));
        modal.hide();

        console.log('Selected date:', formattedDate) ;
    }

    document.getElementById('reschedule-btn').addEventListener('click', handleReschedule);

    document.getElementById('datepick').addEventListener('click', openModal);
    document.querySelector('.close-btn').addEventListener('click', openModal);
</script>