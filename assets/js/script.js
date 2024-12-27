// Document Ready
$(document).ready(function() {
    // Initialize tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });

    // Form validation
    function validateForm(formId) {
        const form = document.getElementById(formId);
        if (!form) return true;

        let isValid = true;
        const requiredFields = form.querySelectorAll('[required]');

        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                isValid = false;
                field.classList.add('is-invalid');
            } else {
                field.classList.remove('is-invalid');
            }
        });

        return isValid;
    }

    // Handle form submissions
    $('.needs-validation').submit(function(event) {
        if (!validateForm(this.id)) {
            event.preventDefault();
            event.stopPropagation();
        }
        $(this).addClass('was-validated');
    });

    // Dynamic form fields
    $('#visitorType').change(function() {
        const type = $(this).val();
        if (type === 'visitor') {
            $('#visitorFields').show();
            $('#clientFields').hide();
        } else {
            $('#visitorFields').hide();
            $('#clientFields').show();
        }
    });

    // Service type selection
    $('#serviceType').change(function() {
        const selectedService = $(this).val();
        $('.service-form').hide();
        $(`#${selectedService}Form`).show();
    });

    // Auto-hide alerts
    $('.alert-dismissible').each(function() {
        const alert = $(this);
        setTimeout(function() {
            alert.alert('close');
        }, 5000);
    });

    // Search functionality
    $('#searchInput').on('keyup', function() {
        const value = $(this).val().toLowerCase();
        $("#searchTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    // Handle task assignment
    $('.assign-task').click(function() {
        const taskId = $(this).data('task-id');
        const userId = $('#userSelect').val();
        
        $.post('assign_task.php', {
            task_id: taskId,
            user_id: userId
        })
        .done(function(response) {
            showAlert('Task assigned successfully', 'success');
        })
        .fail(function() {
            showAlert('Failed to assign task', 'danger');
        });
    });

    // Custom alert function
    function showAlert(message, type = 'info') {
        const alertHtml = `
            <div class="alert alert-${type} alert-dismissible fade show" role="alert">
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        `;
        $('#alertContainer').html(alertHtml);
    }
});

// Date formatting
function formatDate(date) {
    const options = { 
        year: 'numeric', 
        month: 'long', 
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit'
    };
    return new Date(date).toLocaleDateString('en-US', options);
}

// Phone number formatting
function formatPhoneNumber(number) {
    return number.replace(/(\d{3})(\d{3})(\d{4})/, '$1-$2-$3');
}
