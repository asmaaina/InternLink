<?php
    $userName = 'Aina Rahman';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="InternLink is an internship tracking system that helps students manage applications, tasks, attendance, logbooks, and internship progress efficiently.">
    <meta name="keywords" content="Internship Tracker, Internship Management, Student Dashboard, Internship Applications">
    <meta name="author" content="Asma Aina Juraime">
    <!-- Internship application-->
    <title>InternLink</title>
    <!--Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <!--Boxicons CDN -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!--Google Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <!--Custom CSS-->
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/responsive.css">
</head>

<body>
    <!--Sidebar-->
    <div class="sidebar">
        <div class="logo-details">
            <img src="./img/logo_1.png" alt="InternLink Logo" class="logo">
            <span class="logo_name">InternLink</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="dashboard.php" class="active">
                    <i class='bx bx-grid-alt' ></i>
                    <span class="link_name">Dashboard</span>
                </a>
                <ul class="sub-menu blank">
                <li><a class="link_name" href="dashboard.php">Dashboard</a></li>
                </ul>
            </li>
            <li>
            <div class="icon-link"> 
                <button type="button" class="submenu-toggle" aria-expanded="false" aria-label="Toggle application submenu">
                    <span class="d-flex align-items-center gap-2">
                        <i class='bx bx-briefcase-alt-2' ></i>
                        <span class="link_name">Applications</span>
                    </span>
                    <i class='bx bxs-chevron-down submenu-icon'></i>
                </button>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="application.php">Applications</a></li>
                <li><a href="application.php">Tracking Applications</a></li>
                <li><a href="app_details.php">Application Details</a></li>
            </ul>
            </li>
            <li>
                <a href="tasks.php">
                    <i class="bx bx-task"></i>
                    <span class="link_name">Tasks</span>
                </a>
                <ul class="sub-menu blank">
                <li><a class="link_name" href="tasks.php">Tasks</a></li>
                </ul>   
            </li>
            <li>
                <a href="attendance.php">
                    <i class='bx bx-calendar' ></i>
                    <span class="link_name">Attendance & <br> Logbook</span>
                </a>
                <ul class="sub-menu blank">
                <li><a class="link_name" href="attendance.php">Attendance & Logbook</a></li>
                </ul>                
            </li>
            <li>
                <a href="reports.php">
                    <i class='bx bx-message-square-detail' ></i>
                    <span class="link_name">Reports & <br> Analytics</span>
                </a>
                <ul class="sub-menu blank">
                <li><a class="link_name" href="reports.php">Reports & Analytics</a></li>
                </ul>
            </li>
            <li>
                <a href="profile.php">
                    <i class="bx bx-user-circle" ></i>
                    <span class="link_name">Profile</span>
                </a>
                <ul class="sub-menu blank">
                <li><a class="link_name" href="profile.php">Profile</a></li>
                </ul>
            </li>
            <li>
                <a href="settings.php">
                <i class='bx bx-cog' ></i>
                    <span class="link_name">Settings</span>
                </a>
                <ul class="sub-menu blank">
                <li><a class="link_name" href="settings.php">Settings</a></li>
                </ul>
            </li>
            <li class="logout-link">
                <a href="logout.php">
                    <i class='bx bx-log-out'></i>
                    <span class="link_name">Logout</span>
                </a>
            </li>   
        </ul>
    </div>
    
    <!--Topbar & Notifications-->
    <section class="home-section">
        <div class="topbar">
            <div class="topbar-left">
                <button class="menu-toggle btn btn-outline-secondary" aria-label="Toggle sidebar"><i class='bx bx-menu'></i></button>
                <div class="topbar-title-group">
                    <div>
                        <p class="topbar-label">InternLink</p>
                    </div>
                </div>
            </div>
            <div class="topbar-right">
                <button type="button" class="topbar-icon-btn" onclick="toggleNotif()" aria-label="Show notifications">
                    🔔<span class="notif-dot"></span>
                </button>
                <button type="button" class="dark-mode-toggle" id="darkModeToggle" title="Toggle dark mode" aria-label="Toggle dark mode">
                    <i class="bx bx-moon" style="color:#fff200;" id="darkModeIcon"></i>
                </button>
                <a href="#" class="avatar-link" aria-label="Go to profile">
                    <span class="avatar">AR</span>
                </a>
            </div>
        </div>
        <div class="notif-panel" id="notifPanel" aria-hidden="true">
            <div class="notif-header">
                <span>Notifications</span>
                <button type="button" class="notif-clear-btn" id="notifClearBtn" onclick="clearNotifications()">Mark all read</button>
            </div>
            <div class="notif-list">
                <div class="notif-item">
                    <div class="notif-icon notif-icon-teal">📅</div>
                    <div class="notif-body">
                        <p>Interview scheduled — Accenture, 25 May</p>
                        <span>2 hours ago</span>
                    </div>
                </div>
                <div class="notif-item">
                    <div class="notif-icon notif-icon-teal">✅</div>
                    <div class="notif-body">
                        <p>Week 3-4 report submitted successfully</p>
                        <span>Yesterday</span>
                    </div>
                </div>
                <div class="notif-item">
                    <div class="notif-icon notif-icon-amber">⏰</div>
                    <div class="notif-body">
                        <p>Task deadline tomorrow — UI Prototype v2</p>
                        <span>Yesterday</span>
                    </div>
                </div>
                <div class="notif-item">
                    <div class="notif-icon notif-icon-red">📋</div>
                    <div class="notif-body">
                        <p>Week 5-8 log is pending supervisor review</p>
                        <span>2 days ago</span>
                    </div>
                </div>
            </div>
            <div class="notif-empty" id="notifEmpty" style="display:none;">
                <p>No new notifications</p>
            </div>
        </div>

    <div class="content">
  <div class="section-title">Settings</div>
  <div class="section-sub">Manage your account preferences and customise the system</div>
 
  <!-- Account Settings -->
  <div class="settings-section">
    <h3>Account Settings</h3>
    <p class="desc">Update your personal information and login credentials</p>
    <div class="form-grid">
      <div class="form-group"><label>Full Name</label><input class="settings-input" value="UserName"></div>
      <div class="form-group"><label>Email</label><input class="settings-input" value="user@uitm.edu.my"></div>
      <div class="form-group"><label>Phone Number</label><input class="settings-input" value="+60 11-1234 5678"></div>
      <div class="form-group"><label>Student ID</label><input class="settings-input" value="2022123456"></div>
    </div>
    <div style="margin-top:16px"><button class="btn btn-teal">Save Changes</button></div>
  </div>
 
  <!-- Appearance -->
  <div class="settings-section">
    <h3>Appearance</h3>
    <p class="desc">Customise how the system looks and feels</p>
    <div class="settings-row">
      <div><div>Theme</div><div class="hint">Choose between light and dark mode</div></div>
      <div class="theme-switcher">
        <button class="theme-opt active" id="theme-light" onclick="setTheme('light')">☀ Light</button>
        <button class="theme-opt" id="theme-dark" onclick="setTheme('dark')">🌙 Dark</button>
      </div>
    </div>
    <div class="settings-row">
      <div><div>Compact Sidebar</div><div class="hint">Collapse sidebar to icon-only view</div></div>
      <div class="toggle" onclick="this.classList.toggle('on')"></div>
    </div>
  </div>
 
  <!-- Notifications -->
  <div class="settings-section">
    <h3>Notifications</h3>
    <p class="desc">Choose what you want to be notified about</p>
    <div class="settings-row"><div><div>Task Reminders</div><div class="hint">Get notified about upcoming deadlines</div></div><div class="toggle on" onclick="this.classList.toggle('on')"></div></div>
    <div class="settings-row"><div><div>Attendance Alerts</div><div class="hint">Reminder to log your attendance daily</div></div><div class="toggle on" onclick="this.classList.toggle('on')"></div></div>
    <div class="settings-row"><div><div>Report Notifications</div><div class="hint">Alerts when reports are approved or rejected</div></div><div class="toggle on" onclick="this.classList.toggle('on')"></div></div>
  </div>
 
  <!-- Security -->
  <div class="settings-section">
    <h3>Security</h3>
    <p class="desc">Manage your password and account security</p>
    <div class="form-grid" style="max-width:460px">
      <div class="form-group"><label>Current Password</label><input class="settings-input" type="password" placeholder="••••••••"></div>
      <div class="form-group"><label>New Password</label><input class="settings-input" type="password" placeholder="Min. 8 characters"></div>
    </div>
    <div style="margin-top:16px;display:flex;gap:10px">
      <button class="btn btn-teal">Update Password</button>
      <a href="logout.php" class="btn btn-outline" style="color:var(--red);border-color:var(--red)">Sign Out</a>
    </div>
  </div>
</div>    
    

    <!--Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!--Custom JS-->
    <script src="./script.js"></script>
</body>
</html>