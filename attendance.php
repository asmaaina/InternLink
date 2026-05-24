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
    
    <!--Internship Attendance & Logbook Main Content Start-->
    <div class="content">
  <div class="section-title">Attendance &amp; Logbook</div>
  <div class="section-sub">Track your daily attendance and document your learning journey</div>
 
  <div class="chart-grid">
    <!-- Calendar -->
    <div class="chart-card">
      <div class="chart-header">
        <div class="chart-title">📅 May 2025</div>
        <div style="display:flex;gap:8px;"><button class="btn btn-sm btn-outline">◀</button><button class="btn btn-sm btn-outline">▶</button></div>
      </div>
      <div class="cal-grid">
        <div class="cal-day-name">Sun</div><div class="cal-day-name">Mon</div><div class="cal-day-name">Tue</div>
        <div class="cal-day-name">Wed</div><div class="cal-day-name">Thu</div><div class="cal-day-name">Fri</div><div class="cal-day-name">Sat</div>
        <div class="cal-day empty"></div><div class="cal-day empty"></div><div class="cal-day empty"></div>
        <div class="cal-day present">1</div><div class="cal-day present">2</div><div class="cal-day present">3</div><div class="cal-day">4</div>
        <div class="cal-day present">5</div><div class="cal-day present">6</div><div class="cal-day present">7</div><div class="cal-day present">8</div><div class="cal-day present">9</div><div class="cal-day absent">10</div><div class="cal-day">11</div>
        <div class="cal-day present">12</div><div class="cal-day present">13</div><div class="cal-day present">14</div><div class="cal-day present">15</div><div class="cal-day present">16</div><div class="cal-day present">17</div><div class="cal-day">18</div>
        <div class="cal-day present">19</div><div class="cal-day today">20</div><div class="cal-day">21</div><div class="cal-day">22</div><div class="cal-day">23</div><div class="cal-day">24</div><div class="cal-day">25</div>
        <div class="cal-day">26</div><div class="cal-day">27</div><div class="cal-day">28</div><div class="cal-day">29</div><div class="cal-day">30</div><div class="cal-day">31</div>
      </div>
      <div class="cal-legend">
        <div class="cal-legend-item"><div class="cal-legend-dot" style="background:var(--teal-light);border:1px solid var(--teal)"></div>Present</div>
        <div class="cal-legend-item"><div class="cal-legend-dot" style="background:var(--red-light);border:1px solid var(--red)"></div>Absent</div>
        <div class="cal-legend-item"><div class="cal-legend-dot" style="background:var(--teal)"></div>Today</div>
      </div>
    </div>
 
    <!-- Today's Log -->
    <div class="chart-card">
      <div class="chart-header"><div class="chart-title">⏱ Today's Log</div><span class="badge badge-teal"><?= date('j F Y') ?></span></div>
      <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-bottom:16px;">
        <div style="padding:14px;background:var(--surface2);border-radius:var(--radius-sm);text-align:center;">
          <div style="font-size:11px;color:var(--text-muted);font-weight:600;margin-bottom:4px;">CHECK-IN</div>
          <div style="font-size:22px;font-weight:700;font-family:'Sora',sans-serif;color:var(--teal);">09:02</div>
        </div>
        <div style="padding:14px;background:var(--surface2);border-radius:var(--radius-sm);text-align:center;">
          <div style="font-size:11px;color:var(--text-muted);font-weight:600;margin-bottom:4px;">CHECK-OUT</div>
          <div style="font-size:22px;font-weight:700;font-family:'Sora',sans-serif;color:var(--text-muted);">--:--</div>
        </div>
      </div>
      <div style="text-align:center;padding:10px;background:var(--amber-light);border-radius:var(--radius-sm);margin-bottom:16px;">
        <span style="font-size:13px;color:var(--amber);font-weight:600;">Currently checked in — 7h 23m elapsed</span>
      </div>
      <div style="margin-top:12px;">
        <div class="info-row"><span class="info-label">This Week</span><span class="info-value fw-600">39.5h</span></div>
        <div class="info-row"><span class="info-label">This Month</span><span class="info-value fw-600">156h</span></div>
        <div class="info-row"><span class="info-label">Total Hours</span><span class="info-value fw-600" style="color:var(--teal)">120h / 200h</span></div>
      </div>
    </div>
  </div>
 
  <!-- Logbook -->
  <div class="chart-card">
    <div class="chart-header">
      <div class="chart-title">📓 Internship Logbook</div>
    </div>
    <div class="logbook-list" id="logbook-list"></div>
  </div>
</div>
 
<script>
  document.addEventListener('DOMContentLoaded', function() { renderLogbook(); });
</script>
    

    <!--Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!--Custom JS-->
    <script src="./script.js"></script>
</body>
</html>