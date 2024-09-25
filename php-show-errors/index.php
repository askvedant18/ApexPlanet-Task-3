<?php 
session_start();
require_once('form-submit.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Show Error on Form Submit</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
  <div class="container">
    <h1 id="page-title">PHP Show Error on Form Submit</h1>
    <hr id="title_hr">
        <div id="form-wrapper">
            <!-- Form Wrapper -->
            <form action="" method="POST">
                <!-- Display Error If Exists -->
                <?php if(isset($errors['error']) && !empty($errors['error'])): ?>
                    <div class="msg-error"><?= $errors['error'] ?></div>
                <?php endif; ?>
                <!-- Display Error If Exists -->
                <!-- Display Success Message If Exists -->
                <?php if(isset($_SESSION['success_msg']) && !empty($_SESSION['success_msg'])): ?>
                    <div class="msg-success"><?= $_SESSION['success_msg'] ?></div>
                <?php unset($_SESSION['success_msg']); ?>
                <?php endif; ?>
                <!-- Display Success Message If Exists -->
                <!-- Member's Name Field -->
                <div class="field-group">
                    <label for="name">Name <sup><small class="required-field">*</small></sup></label>
                    <input type="text" id="name" name="name" autofocus value="<?= $_POST['name'] ?? "" ?>">
                <!-- Member's Name Field Error Message -->
                    <?php if(isset($errors['name']) && !empty($errors['name'])): ?>
                    <div class="error-msg"><?= $errors['name'] ?></div>
                    <?php endif; ?>
                <!-- Member's Name Field Error Message -->
                </div>
                <!-- Member's Name Field -->
                <!-- Member's Email Field -->
                <div class="field-group">
                    <label for="email">Email <sup><small class="required-field">*</small></sup></label>
                    <input type="text" id="email" name="email" value="<?= $_POST['email'] ?? "" ?>">
                    <!-- Member's Email Field Error Message -->
                    <?php if(isset($errors['email']) && !empty($errors['email'])): ?>
                    <div class="error-msg"><?= $errors['email'] ?></div>
                    <?php endif; ?>
                    <!-- Member's Email Field Error Message -->
                </div>
                <!-- Member's Email Field -->
                <div class="field-group">
                    <label for="phone">Contact No. <sup><small class="required-field">*</small></sup></label>
                    <input type="text" id="phone" name="phone" value="<?= $_POST['phone'] ?? "" ?>">
                    <?php if(isset($errors['phone']) && !empty($errors['phone'])): ?>
                    <div class="error-msg"><?= $errors['phone'] ?></div>
                    <?php endif; ?>
                </div>
                <!-- Form Buttons -->
                <div class="btn-group">
                    <button id="btn-submit" type="submit"><span class="material-symbols-outlined">save</span> Save</button>
                    <button id="btn-reset" type="reset"><span class="material-symbols-outlined">restart_alt</span> Reset</button>
                </div>
                <!-- Form Buttons -->
            </form>
            <!-- Form Wrapper -->
        </div>
    </div>
</body>
</html>