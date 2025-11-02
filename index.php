<?php
function e($s) {
    return htmlspecialchars(trim($s), ENT_QUOTES, 'UTF-8');
}

$submitted = ($_SERVER['REQUEST_METHOD'] === 'POST');

if ($submitted) {
    
    $full_name = e($_POST['full_name'] ?? '');
    $email = e($_POST['email'] ?? '');
    $phone = e($_POST['phone'] ?? '');
    $dob = e($_POST['dob'] ?? '');
    $gender = e($_POST['gender'] ?? '');
    $address = e($_POST['address'] ?? '');
    $education = e($_POST['education'] ?? '');
    $skills = e($_POST['skills'] ?? '');
    $objective = e($_POST['objective'] ?? '');
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Online Registration - Saarthak Dubey</title>
  <link rel="stylesheet" href="style1.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
  <div class="container">
    <header>
      <h1>Online Registration Form</h1>
      <p class="subtitle">Fill in your details and get a formatted printable confirmation after submission.</p>
    </header>

<?php if (! $submitted): ?>
    
    <form id="regForm" method="post" action="index.php" novalidate>
      <div class="form-row">
        <label for="full_name">Full name <span class="req">*</span></label>
        <input id="full_name" name="full_name" type="text" required>
      </div>

      <div class="form-row">
        <label for="email">Email <span class="req">*</span></label>
        <input id="email" name="email" type="email" required>
      </div>

      <div class="form-row">
        <label for="phone">Phone</label>
        <input id="phone" name="phone" type="tel" pattern="[0-9+\-\s]{7,20}">
      </div>

      <div class="form-row two-col">
        <div>
          <label for="dob">Date of Birth</label>
          <input id="dob" name="dob" type="date">
        </div>
        <div>
          <label for="gender">Gender</label>
          <select id="gender" name="gender">
            <option value="">Prefer not to say</option>
            <option>Male</option>
            <option>Female</option>
            <option>Other</option>
          </select>
        </div>
      </div>

      <div class="form-row">
        <label for="address">Address</label>
        <textarea id="address" name="address" rows="3"></textarea>
      </div>

      <div class="form-row">
        <label for="education">Highest Education</label>
        <input id="education" name="education" type="text" placeholder="B.Sc / B.Tech / Diploma etc.">
      </div>

      <div class="form-row">
        <label for="skills">Key Skills (comma separated)</label>
        <input id="skills" name="skills" type="text">
      </div>

      <div class="form-row">
        <label for="objective">Objective / Short Bio</label>
        <textarea id="objective" name="objective" rows="4"></textarea>
      </div>

      <div class="form-actions">
        <button type="submit" id="submitBtn">Submit</button>
        <button type="reset" class="secondary">Reset</button>
      </div>
    </form>

    <footer class="foot-note">
      <p>Tip: Use valid email. All required fields are marked with <span class="req">*</span>.</p>
    </footer>

<?php else: ?>
    
    <div id="confirmation" class="confirmation">
      <div class="conf-header">
        <h2>Application / Registration Summary</h2>
        <div class="conf-actions">
          <button id="printBtn">Print</button>
          <a class="back-link" href="index.php">Submit another response</a>
        </div>
      </div>

      <section class="conf-content">
        <div class="conf-row">
          <h3>Full Name</h3>
          <p><?php echo $full_name ?: '<em>Not provided</em>'; ?></p>
        </div>

        <div class="conf-row two-up">
          <div>
            <h3>Email</h3>
            <p><?php echo $email ?: '<em>Not provided</em>'; ?></p>
          </div>
          <div>
            <h3>Phone</h3>
            <p><?php echo $phone ?: '<em>Not provided</em>'; ?></p>
          </div>
        </div>

        <div class="conf-row two-up">
          <div>
            <h3>Date of Birth</h3>
            <p><?php echo $dob ?: '<em>Not provided</em>'; ?></p>
          </div>
          <div>
            <h3>Gender</h3>
            <p><?php echo $gender ?: '<em>Not provided</em>'; ?></p>
          </div>
        </div>

        <div class="conf-row">
          <h3>Address</h3>
          <p><?php echo nl2br($address) ?: '<em>Not provided</em>'; ?></p>
        </div>

        <div class="conf-row two-up">
          <div>
            <h3>Education</h3>
            <p><?php echo $education ?: '<em>Not provided</em>'; ?></p>
          </div>
          <div>
            <h3>Skills</h3>
            <p><?php echo $skills ?: '<em>Not provided</em>'; ?></p>
          </div>
        </div>

        <div class="conf-row">
          <h3>Objective / Short Bio</h3>
          <p><?php echo nl2br($objective) ?: '<em>Not provided</em>'; ?></p>
        </div>
      </section>

      <footer class="conf-footer">
        <p>Submitted on <?php echo date('d M Y, H:i'); ?></p>
      </footer>
    </div>

    <script>
    
    document.getElementById('printBtn').addEventListener('click', function() {
        window.print();
    });
    </script>
<?php endif; ?>

  </div>

  <script src="script1.js"></script>
</body>
</html>
