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
    
    <!--Task Main Content Start-->
        <div class="content">
  <div class="section-title">Task Management</div>
  <div class="section-sub">Track and manage your internship tasks and deliverables</div>
 
  <div class="d-flex flex-wrap gap-2 mb-3 align-items-center">
    <select id="filter-priority" onchange="filterTasks()" class="filter-select">
      <option value="all">All Priority</option>
      <option value="High">High</option>
      <option value="Medium">Medium</option>
      <option value="Low">Low</option>
    </select>
    <select id="filter-task-status" onchange="filterTasks()" class="filter-select">
      <option value="all">All Status</option>
      <option value="To Do">To Do</option>
      <option value="In Progress">In Progress</option>
      <option value="Completed">Completed</option>
    </select>
    <button type="button" class="btn btn-teal btn-sm ms-auto" data-modal-target="modal-task">+ Add Task</button>
  </div>
 
  <div class="table-card table-responsive">
    <table class="table table-hover table-sm align-middle mb-0">
      <thead class="table-light"><tr><th>Task</th><th>Project</th><th>Deadline</th><th>Priority</th><th>Status</th><th>Progress</th></tr></thead>
      <tbody id="tasks-tbody"></tbody>
    </table>
  </div>
</div>

<div class="modal-overlay" id="modal-task">
  <div class="modal">
    <button type="button" class="modal-close" data-modal-close aria-label="Close modal">&times;</button>
    <h3>Add New Task</h3>
    <p class="desc">Create a new task for your internship</p>

    <form id="task-form" class="modal-form" novalidate>
      <div class="form-grid">
        <div class="form-group" style="grid-column: 1 / -1;">
          <label>Task Name</label>
          <input class="settings-input" id="new-task-name" name="new-task-name" placeholder="e.g. Design onboarding flow">
        </div>

        <div class="form-group">
          <label>Project</label>
          <input class="settings-input" id="new-task-project" name="new-task-project" placeholder="e.g. Mobile App Redesign">
        </div>

        <div class="form-group">
          <label>Deadline</label>
          <input class="settings-input" id="new-task-deadline" name="new-task-deadline" type="date">
        </div>

        <div class="form-group">
          <label>Priority</label>
          <select class="settings-input" id="new-task-priority" name="new-task-priority">
            <option>High</option>
            <option selected>Medium</option>
            <option>Low</option>
          </select>
        </div>

        <div class="form-group">
          <label>Status</label>
          <select class="settings-input" id="new-task-status" name="new-task-status">
            <option>To Do</option>
            <option>In Progress</option>
            <option>Completed</option>
          </select>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-outline" data-modal-close>Cancel</button>
        <button type="submit" class="btn btn-teal">Add Task</button>
      </div>
    </form>
  </div>
</div>
</div>
 
<script>
  document.addEventListener('DOMContentLoaded', function() { renderTasks(tasks); });
</script>

    <!--Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!--Custom JS-->
    <script src="./script.js"></script>
</body>
</html>