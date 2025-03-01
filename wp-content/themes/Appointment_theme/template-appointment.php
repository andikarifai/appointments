<?php
/* Template Name: Janji Temu */
get_header();
?>

<div class="container mt-5 pt-5">
    <h2 class="text-center">Buat Janji Temu</h2>

    <div class="appointment-form mx-auto mt-4" style="max-width: 500px;">
        <form action="" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Tanggal Janji</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Kirim</button>
        </form>
    </div>
</div>

<?php get_footer(); ?>
