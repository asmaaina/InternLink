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
    <!--Sidebar Start-->
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
                            <i class='bx bx-briefcase-alt-2'></i>
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
    <!--Sidebar End-->

    <!--Topnav & Notifications Start-->
        <!--Top Navbar-->
        <section class="home-section">
            <div class="topbar">
                <div class="topbar-left">
                    <button class="menu-toggle btn btn-outline-secondary" aria-label="Toggle sidebar"><i class='bx bx-menu'></i></button>
                    <div class="topbar-title-group">
                        <div>
                            <p class="topbar-label">InternLink</p>
                            <h2 class="topbar-title">Dashboard</h2>
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
        <!--Top Navbar End-->    
        <!-- Notifications Panel Start -->
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
        <!-- Notifications Panel End -->
    <!--Topnav & Notifications End-->
    
    <!--Dashboard Content Start-->
        <div class="dashboard-content">
            <div class="dashboard-main">
                <div class="dashboard-header">
                    <div class="welcome-panel">
                        <p class="welcome-label">Welcome back, User <span aria-hidden="true">👋</span></p>
                        <h3>Here's your internship overview for today — <?php echo date('l, j F Y'); ?></h3>
                    </div>
                    <div class="dashboard-actions">
                        <button type="button" class="btn action-btn open-modal-btn" data-modal-target="modal-task">+ Add Task</button>
                        <button type="button" class="btn action-btn open-modal-btn" data-modal-target="modal-attendance">📍 Log Attendance</button>
                        <button type="button" class="btn action-btn" onclick="window.location.href='reports.php'">📊 View Reports</button>
                        <button type="button" class="btn action-btn" onclick="window.location.href='attendance.php'">📒 View Logbook</button>
                    </div>
                </div>
                <div class="cards-grid">
                    <article class="metric-card metric-card--teal">
                        <div class="card-icon">⏱️</div>
                        <div class="card-value">120</div>
                        <div class="card-label">Internship Hours</div>
                        <div class="card-meta">↗ 8h this week</div>
                    </article>
                    <article class="metric-card metric-card--green">
                        <div class="card-icon">✅</div>
                        <div class="card-value">18</div>
                        <div class="card-label">Tasks Completed</div>
                        <div class="card-meta">↗ 3 this week</div>
                    </article>
                    <article class="metric-card metric-card--blue">
                        <div class="card-icon">📅</div>
                        <div class="card-value">95%</div>
                        <div class="card-label">Attendance Rate</div>
                        <div class="card-meta">↗ 2% vs last month</div>
                    </article>
                    <article class="metric-card metric-card--purple">
                        <div class="card-icon">📄</div>
                        <div class="card-value">3</div>
                        <div class="card-label">Reports Submitted</div>
                        <div class="card-meta">1 pending review</div>
                    </article>
                </div>
                <div class="chart-grid">
                    <div class="chart-card">
                        <div class="chart-header">
                            <div>
                                <div class="chart-title">Internship Progress</div>
                                <div class="chart-subtitle">120 / 200 hours completed</div>
                            </div>
                            <span class="badge badge-teal">60%</span>
                        </div>
                        <div class="chart-wrap"><canvas id="chart-doughnut"></canvas></div>
                    </div>
                    <div class="chart-card">
                        <div class="chart-header">
                            <div>
                                <div class="chart-title">Weekly Working Hours</div>
                                <div class="chart-subtitle">Current week</div>
                            </div>
                        </div>
                        <div class="chart-wrap"><canvas id="chart-weekly"></canvas></div>
                    </div>
                </div>

                <div class="bottom-grid">
                    <div class="chart-card">
                        <div class="chart-header">
                            <div class="chart-title">Upcoming Tasks</div>
                            <a href="tasks.php" class="btn btn-sm btn-outline">View all</a>
                        </div>
                        <div id="upcoming-tasks-list"></div>
                    </div>
                    <div class="chart-card">
                        <div class="chart-header"><div class="chart-title">Today's Schedule</div></div>
                        <div class="schedule-item">
                            <div class="sched-time">9:00 AM</div>
                            <div class="sched-dot"></div>
                            <div><div class="sched-title">Team Standup</div><div class="sched-loc">Meeting Room B2</div></div>
                        </div>
                        <div class="schedule-item">
                            <div class="sched-time">11:00 AM</div>
                            <div class="sched-dot" style="background:var(--amber)"></div>
                            <div><div class="sched-title">UI Design Review</div><div class="sched-loc">Google Meet</div></div>
                        </div>
                        <div class="schedule-item">
                            <div class="sched-time">2:00 PM</div>
                            <div class="sched-dot" style="background:var(--blue)"></div>
                            <div><div class="sched-title">Sprint Planning</div><div class="sched-loc">Supervisor's Office</div></div>
                        </div>
                        <div class="schedule-item">
                            <div class="sched-time">4:30 PM</div>
                            <div class="sched-dot" style="background:var(--purple)"></div>
                            <div><div class="sched-title">Submit Daily Log</div><div class="sched-loc">Online Portal</div></div>
                        </div>
                    </div>
                    <div class="reflection-card">
                        <div class="chart-title">📝 Daily Reflection</div>
                        <div class="chart-subtitle" style="font-size:12px;color:var(--text-muted);margin-top:4px">What did you learn today?</div>
                        <textarea placeholder="Write your thoughts, learnings, and takeaways from today's work..." style="font-size:12px;"></textarea>
                        <button class="btn btn-teal btn-sm" style="margin-top:10px">Save Reflection</button>
                    </div>
                </div> 
            
                <!-- =============================================
                     MODAL: Add New Task
                     Opens when user clicks the "Add Task" button
                     ============================================= -->
                <div class="modal-overlay" id="modal-task">
                  <div class="modal">
                    <button type="button" class="modal-close" data-modal-close aria-label="Close modal">&times;</button>
                    <h3>Add New Task</h3>
                    <p class="desc">Create a new task for your internship</p>

                    <form id="task-form" class="modal-form" novalidate>
                      <div class="form-grid">

                      <!-- Task Name spans both columns -->
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


                <!-- =============================================
                     MODAL: Log Attendance
                     Opens when user clicks "Log Attendance"
                     ============================================= -->
                <div class="modal-overlay" id="modal-attendance">
                  <div class="modal">
                    <button type="button" class="modal-close" data-modal-close aria-label="Close modal">&times;</button>
                    <h3>Log Attendance</h3>
                    <p class="desc">Record your check-in and check-out for today</p>

                    <form id="attendance-form" class="modal-form" novalidate>
                      <div class="form-grid">

                        <div class="form-group">
                          <label>Date</label>
                          <input class="settings-input" id="att-date" name="att-date" type="date">
                        </div>

                        <div class="form-group">
                          <label>Status</label>
                          <select class="settings-input" id="att-status" name="att-status">
                            <option>Present</option>
                            <option>Absent</option>
                            <option>MC</option>
                            <option>AL</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <label>Check-in Time</label>
                          <input class="settings-input" id="att-checkin" name="att-checkin" type="time" value="09:00">
                        </div>

                        <div class="form-group">
                          <label>Check-out Time</label>
                          <input class="settings-input" id="att-checkout" name="att-checkout" type="time" value="18:00">
                        </div>

                      </div>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-outline" data-modal-close>Cancel</button>
                        <button type="submit" class="btn btn-teal">Log Attendance</button>
                      </div>
                    </form>
                  </div>
                </div>
                </div>    
            </div>
        </div>
    </section>
    <!--Dashboard Content End-->

    <!--Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!--Custom JS-->
    <script src="./script.js"></script>
</body>
</html>