<?php
// mysql connect to phpserver
$db = new mysqli('localhost', 'SANDESH', 'sandesh12345', 'portfolio_db');
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// fetch skills from the database
function getSkills($db) {
    $skills = [];
    $result = $db->query("SELECT * FROM skills ORDER BY level DESC");
    while ($row = $result->fetch_assoc()) {
        $skills[] = $row;
    }
    return $skills;
}

//fetch project from the database
function getProjects($db) {
    $projects = [];
    $result = $db->query("SELECT * FROM projects");
    while ($row = $result->fetch_assoc()) {
        $projects[] = $row;
    }
    return $projects;
}

// form 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $db->real_escape_string($_POST['name']);
    $email = $db->real_escape_string($_POST['email']);
    $subject = $db->real_escape_string($_POST['subject']);
    $message = $db->real_escape_string($_POST['message']);
    
    $sql = "INSERT INTO messages (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
    if ($db->query($sql) === TRUE) {
        $formSubmissionMessage = "Message sent successfully!";
    } else {
        $formSubmissionMessage = "Error: " . $sql . "<br>" . $db->error;
    }
}

$skills = getSkills($db);
$projects = getProjects($db);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sandesh Sanjay Kamble - Website</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main-background">
        <header class="header">
            <div class="header-content">
                <div class="logo">
                    <div class="profile-image"></div>
                    <h1 data-translate="Sandesh Sanjay Kamble">Sandesh Sanjay Kamble</h1>
                </div>
                <nav>
                    <ul>
                        <li><a href="#about" data-translate="About">About</a></li>
                        <li><a href="#education" data-translate="Education">Education</a></li>
                        <li><a href="#skills" data-translate="Skills">Skills</a></li>
                        <li><a href="#projects" data-translate="Projects">Projects</a></li>
                        <li><a href="#contact" data-translate="Contact">Contact</a></li>
                    </ul>
                    <button class="theme-toggle" onclick="toggleTheme()" data-translate="🌙☀️">🌙☀️</button>
                    <button class="lang-toggle" onclick="toggleLanguage()">🌐 EN</button>
                </nav>
            </div>
        </header>

        <section class="mainview">
            <div class="mainview-content">
                <h2 data-translate="Aspiring Developer | Code Explorer">Aspiring Developer | Code Explorer</h2>
                <p data-translate="Student Seeking Internship to Transform Ideas into Code">Student Seeking Internship to Transform Ideas into Code</p>
            </div>
        </section>

        <main>
            <section id="about">
                <h2 data-translate="About Me">About Me</h2>
                <p data-translate="Enthusiastic Java Developer with hands-on experience in creating scalable backend solutions and designing engaging frontend interfaces. Adept in Java, HTML, CSS, and JavaScript, with a strong understanding of full-stack development. Seeking an opportunity to contribute to a collaborative team, build robust applications, and drive technological innovation through effective software development.">Enthusiastic Java Developer with hands-on experience in creating scalable backend solutions and designing engaging frontend interfaces. Adept in Java, HTML, CSS, and JavaScript, with a strong understanding of full-stack development. Seeking an opportunity to contribute to a collaborative team, build robust applications, and drive technological innovation through effective software development.</p>
                <a href="#" class="resume-btn" data-translate="Download Resume">Download Resume</a>
            </section>

            <section id="education">
                <h2 data-translate="Education">Education</h2>
                <h3 data-translate="Bachelor of Science in Information Technology">Bachelor of Science in Information Technology</h3>
                <p data-translate="Mumbai University, Thane, India">Mumbai University, Thane, India</p>
                <p data-translate="Current: 3rd Semester">Current: 3rd Semester</p>
                <p data-translate="Expected Completion: 2026">Expected Completion: 2026</p>
                <p data-translate="GPA: 9.36/10.00 (Semester II)">GPA: 9.36/10.00 (Semester II)</p>
            </section>

            <section id="skills">
                <h2 data-translate="Skills">Skills</h2>
                <div class="skills">
                    <?php foreach ($skills as $skill): ?>
                        <div class="skill">
                            <div class="skill-name" data-translate="<?php echo htmlspecialchars($skill['name']); ?>"><?php echo htmlspecialchars($skill['name']); ?></div>
                            <div class="skill-bar"><div class="skill-level" style="width: <?php echo $skill['level']; ?>%;"></div></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>

            <section id="projects">
                <h2 data-translate="Projects">Projects</h2>
                <div class="projects">
                    <?php foreach ($projects as $project): ?>
                        <div class="project">
                            <h3 data-translate="<?php echo htmlspecialchars($project['title']); ?>"><?php echo htmlspecialchars($project['title']); ?></h3>
                            <p data-translate="<?php echo htmlspecialchars($project['description']); ?>"><?php echo htmlspecialchars($project['description']); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>

            <section id="contact">
                <h2 data-translate="Contact Me">Contact Me</h2>
                <?php if (isset($formSubmissionMessage)): ?>
                    <p><?php echo $formSubmissionMessage; ?></p>
                <?php endif; ?>
                <p data-translate="Feel free to reach out to me for any inquiries:">Feel free to reach out to me for any inquiries:</p>
                <div class="social-icons">
                    <a href="mailto:sandeshsanjaykamble52@email.com">
                        <img src="https://img.icons8.com/color/48/000000/email.png" alt="Email Icon"/>
                    </a>
                    <a href="https://www.linkedin.com/in/sandesh-sanjay-kamble/" target="_blank">
                        <img src="https://img.icons8.com/color/48/000000/linkedin.png" alt="LinkedIn Logo"/>
                    </a>
                    <a href="https://github.com/kamblesandesh01" target="_blank">
                        <img src="https://img.icons8.com/color/48/000000/github.png" alt="GitHub Logo"/>
                    </a>
                </div>
                <p data-translate="Location: Kalyan, Maharashtra, India">Location: Kalyan, Maharashtra, India</p>
                
                <form class="contact-form" method="POST" action="">
                    <input type="text" name="name" required data-translate="Your Name" data-translate-placeholder="Your Name">
                    <input type="email" name="email" required data-translate="Your Email" data-translate-placeholder="Your Email">
                    <input type="text" name="subject" required data-translate="Subject" data-translate-placeholder="Subject">
                    <textarea name="message" required data-translate="Your Message" data-translate-placeholder="Your Message"></textarea>
                    <button type="submit" class="btn" data-translate="Send Message">Send Message</button>
                </form>
            </section>
        </main>

        <footer>
            <div class="footer-content">
                <div class="footer-section">
                    <h3 data-translate="Quick Links">Quick Links</h3>
                    <ul>
                        <li><a href="#about" data-translate="About">About</a></li>
                        <li><a href="#skills" data-translate="Skills">Skills</a></li>
                        <li><a href="#projects" data-translate="Projects">Projects</a></li>
                        <li><a href="#contact" data-translate="Contact">Contact</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3 data-translate="Contact Info">Contact Info</h3>
                    <p data-translate="Email: sandeshsanjaykamble52@email.com">Email: sandeshsanjaykamble52@email.com</p>
                    <p data-translate="Phone: +91 8291912927 ">Phone: +91 8291912927 </p>
                    <p data-translate="Location: Kalyan, Maharashtra, India">Location: Kalyan, Maharashtra, India</p>
                </div>
                <div class="footer-section">
                    <h3 data-translate="Follow Me">Follow Me</h3>
                    <div class="social-icons">
                        <a href="https://www.linkedin.com/in/sandesh-sanjay-kamble/" target="_blank">
                            <img src="https://img.icons8.com/color/48/000000/linkedin.png" alt="LinkedIn Logo"/>
                        </a>
                        <a href="https://github.com/kamblesandesh01" target="_blank">
                            <img src="https://img.icons8.com/color/48/000000/github.png" alt="GitHub Logo"/>
                        </a>
                    </div>
                </div>
            </div>
            <p data-translate="© 2025 Sandesh Sanjay Kamble. All rights reserved.">© 2025 Sandesh Sanjay Kamble. All rights reserved.</p>
        </footer>
    </div>
    <script src="script.js"></script>
</body>
</html>