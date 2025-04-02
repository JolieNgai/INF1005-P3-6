$(document).ready(function() {
    $(".save-article-form").on("submit", function(e) {
        e.preventDefault();
        const form = $(this);
        const btn = form.find(".save-btn i");
        const originalIcon = btn.attr("class");

        // Show loading spinner
        btn.attr("class", "fas fa-spinner fa-spin");

        $.post("process_save_article.php", form.serialize(), function(response) {
            if (response.trim() === "exists") {
                btn.attr("class", "fas fa-exclamation-circle text-warning");
                btn.closest("button").after(
                    '<span class="text-warning ms-2 small">Exist!</span>');
            } else if (response.trim() === "success") {
                btn.attr("class", "fas fa-check text-success");
            } else if (response === "unauthorized") {
                btn.attr("class", "fas fa-user-lock text-danger");
                btn.closest("button").after(
                    '<span class="text-danger ms-2 small feedback-msg">Please log in!</span>'
                );
            } else {
                btn.attr("class", "fas fa-times text-danger");
            }

            // Revert to original after 2.5s
            setTimeout(() => {
                form.find("span.text-warning").remove();
                btn.attr("class", originalIcon);
            }, 2500);
        }).fail(() => {
            btn.attr("class", "fas fa-times text-danger");
            setTimeout(() => {
                btn.attr("class", originalIcon);
            }, 2000);
        });
    });
});