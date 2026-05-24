onReady(() => {
    initSidebarToggle();
    initAuthFormHandlers();
    initSubmenuToggles();
    initTheme();
    initTopbarHandlers();
    initModals();
    initInternshipProgressChart();
    initWeeklyHoursChart();
    initReportCharts();
    renderUpcomingTasks();
    renderApps(apps);

    setFormDatesToToday();
});

function initTheme() {
    const savedTheme = localStorage.getItem('siteTheme');
    const darkModeIcon = document.getElementById('darkModeIcon');

    if (savedTheme === 'dark') {
        document.body.classList.add('dark-mode');
        if (darkModeIcon) {
            darkModeIcon.classList.remove('bx-moon');
            darkModeIcon.classList.add('bx-sun');
        }
    } else {
        document.body.classList.remove('dark-mode');
        if (darkModeIcon) {
            darkModeIcon.classList.remove('bx-sun');
            darkModeIcon.classList.add('bx-moon');
        }
    }
}

function setTheme(theme) {
    const darkModeIcon = document.getElementById('darkModeIcon');
    if (theme === 'dark') {
        document.body.classList.add('dark-mode');
        localStorage.setItem('siteTheme', 'dark');
        if (darkModeIcon) {
            darkModeIcon.classList.remove('bx-moon');
            darkModeIcon.classList.add('bx-sun');
        }
    } else {
        document.body.classList.remove('dark-mode');
        localStorage.setItem('siteTheme', 'light');
        if (darkModeIcon) {
            darkModeIcon.classList.remove('bx-sun');
            darkModeIcon.classList.add('bx-moon');
        }
    }
}

function initSidebarToggle() {
    const sidebar = document.querySelector('.sidebar');
    const sidebarBtn = document.querySelector('.menu-toggle');
    if (!sidebar || !sidebarBtn) return;

    sidebarBtn.addEventListener('click', () => {
        if (window.innerWidth <= 991) {
            sidebar.classList.toggle('mobile-open');
        } else {
            sidebar.classList.toggle('close');
        }
    });

    window.addEventListener('resize', () => {
        if (window.innerWidth > 991) {
            sidebar.classList.remove('mobile-open');
        }
    });

    document.addEventListener('click', (event) => {
        if (!sidebar.classList.contains('mobile-open')) return;
        if (event.target.closest('.sidebar') || event.target.closest('.menu-toggle')) return;
        sidebar.classList.remove('mobile-open');
    });
}

function initAuthFormHandlers() {
    const container = document.querySelector('.container');
    const registerBtn = document.querySelector('.register-btn');
    const loginBtn = document.querySelector('.login-btn');

    if (!container) return;
    if (registerBtn) {
        registerBtn.addEventListener('click', () => container.classList.add('active'));
    }
    if (loginBtn) {
        loginBtn.addEventListener('click', () => container.classList.remove('active'));
    }
}

function initSubmenuToggles() {
    const toggles = document.querySelectorAll('.submenu-toggle');
    toggles.forEach((toggle) => {
        toggle.addEventListener('click', (event) => {
            event.preventDefault();
            const parentItem = toggle.closest('li');
            if (!parentItem) return;

            const isOpen = parentItem.classList.toggle('showMenu');
            toggle.setAttribute('aria-expanded', String(isOpen));
        });
    });
}

function initTopbarHandlers() {
    const darkModeToggle = document.getElementById('darkModeToggle');
    const darkModeIcon = document.getElementById('darkModeIcon');

    if (darkModeToggle && darkModeIcon) {
        darkModeToggle.addEventListener('click', () => {
            const isDark = document.body.classList.toggle('dark-mode');
            if (isDark) {
                localStorage.setItem('siteTheme', 'dark');
                darkModeIcon.classList.remove('bx-moon');
                darkModeIcon.classList.add('bx-sun');
            } else {
                localStorage.setItem('siteTheme', 'light');
                darkModeIcon.classList.remove('bx-sun');
                darkModeIcon.classList.add('bx-moon');
            }
        });
    }
}

function initModals() {
    const openButtons = document.querySelectorAll('[data-modal-target]');
    const closeButtons = document.querySelectorAll('[data-modal-close]');
    const overlays = document.querySelectorAll('.modal-overlay');

    openButtons.forEach((button) => {
        button.addEventListener('click', () => {
            const targetId = button.dataset.modalTarget;
            if (targetId) {
                openModal(targetId);
            }
        });
    });

    closeButtons.forEach((button) => {
        button.addEventListener('click', () => {
            const overlay = button.closest('.modal-overlay');
            if (overlay) closeModal(overlay.id);
        });
    });

    overlays.forEach((overlay) => {
        overlay.addEventListener('click', (event) => {
            if (event.target === overlay) closeModal(overlay.id);
        });
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            document.querySelectorAll('.modal-overlay.open').forEach((overlay) => closeModal(overlay.id));
        }
    });

    document.querySelectorAll('.modal-form').forEach((form) => {
        form.addEventListener('submit', handleModalSubmit);
    });

    initToast();
}

function openModal(modalId) {
    const overlay = document.getElementById(modalId);
    if (!overlay) return;
    overlay.classList.add('open');
    document.body.style.overflow = 'hidden';
}

function closeModal(modalId) {
    const overlay = document.getElementById(modalId);
    if (!overlay) return;
    overlay.classList.remove('open');
    if (!document.querySelector('.modal-overlay.open')) {
        document.body.style.overflow = '';
    }
}

function initToast() {
    if (document.getElementById('toast')) return;
    const toast = document.createElement('div');
    toast.id = 'toast';
    toast.className = 'toast';
    document.body.appendChild(toast);
}

function handleModalSubmit(event) {
    event.preventDefault();
    const form = event.target;

    if (form.id === 'task-form') {
        handleTaskSubmit(form);
    } else if (form.id === 'attendance-form') {
        handleAttendanceSubmit(form);
    } else if (form.id === 'application-form') {
        handleApplicationSubmit(form);
    }
}

function handleTaskSubmit(form) {
    const name = form.querySelector('[name="new-task-name"]').value.trim();
    const project = form.querySelector('[name="new-task-project"]').value.trim();
    const deadline = form.querySelector('[name="new-task-deadline"]').value;
    const priority = form.querySelector('[name="new-task-priority"]').value;
    const status = form.querySelector('[name="new-task-status"]').value;

    if (!name) {
        showToast('Please enter the task name.', 'error');
        return;
    }

    tasks.unshift({
        name: name,
        project: project || 'General',
        deadline: deadline || 'TBD',
        priority: priority,
        status: status,
        progress: status === 'Completed' ? 100 : 10
    });

    renderTasks(tasks);
    form.reset();
    setFormDatesToToday();
    closeAndToast('modal-task', 'Task added successfully');
}

function handleAttendanceSubmit(form) {
    const date = form.querySelector('[name="att-date"]').value;
    const status = form.querySelector('[name="att-status"]').value;
    const checkin = form.querySelector('[name="att-checkin"]').value;
    const checkout = form.querySelector('[name="att-checkout"]').value;

    if (!date) {
        showToast('Please select a date for attendance.', 'error');
        return;
    }

    form.reset();
    setFormDatesToToday();
    closeAndToast('modal-attendance', 'Attendance logged successfully');
}

function handleApplicationSubmit(form) {
    const company = form.querySelector('[name="new-app-company"]').value.trim();
    const position = form.querySelector('[name="new-app-position"]').value.trim();
    const date = form.querySelector('[name="new-app-date"]').value;
    const status = form.querySelector('[name="new-app-status"]').value;

    if (!company || !position) {
        showToast('Please enter the company and position.', 'error');
        return;
    }

    apps.unshift({
        company: company,
        position: position,
        status: status,
        date: date || 'Today'
    });

    renderApps(apps);
    form.reset();
    setFormDatesToToday();
    closeAndToast('modal-application', 'Application added successfully');
}

function closeAndToast(modalId, message) {
    closeModal(modalId);
    showToast(message, 'success');
}

function setFormDatesToToday() {
    const today = new Date().toISOString().split('T')[0];
    const dateInputs = document.querySelectorAll('#att-date, #new-task-deadline, #new-app-date');
    dateInputs.forEach((input) => { if (input) input.value = today; });
}

function showToast(message, type = 'success') {
    const toast = document.getElementById('toast');
    if (!toast) return;
    toast.textContent = message;
    toast.className = 'toast toast--' + type + ' toast--visible';

    window.clearTimeout(toast.timerId);
    toast.timerId = window.setTimeout(() => {
        toast.classList.remove('toast--visible');
    }, 3200);
}

function onReady(callback) {
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', callback);
    } else {
        callback();
    }
}

function initInternshipProgressChart() {
    const chartElement = document.getElementById('chart-doughnut');
    if (!chartElement || typeof Chart === 'undefined') return;

    new Chart(chartElement, {
        type: 'doughnut',
        data: {
            labels: ['Completed', 'Remaining'],
            datasets: [{
                data: [120, 80],
                backgroundColor: ['#1f8b62', '#f1f3f5'],
                borderWidth: 0,
            }]
        },
        options: {
            cutout: '72%',
            maintainAspectRatio: false,
            responsive: true,
            plugins: {
                legend: { display: false },
                tooltip: { enabled: false }
            }
        }
    });
}

function initWeeklyHoursChart() {
    const chartElement = document.getElementById('chart-weekly');
    if (!chartElement || typeof Chart === 'undefined') return;

    new Chart(chartElement, {
        type: 'bar',
        data: {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'],
            datasets: [{
                data: [7.8, 7.2, 8.9, 7.9, 6.8],
                backgroundColor: 'rgba(34, 166, 123, 0.24)',
                borderColor: '#1f8b62',
                borderWidth: 2,
                borderRadius: 16,
                borderSkipped: false,
                maxBarThickness: 48,
            }]
        },
        options: {
            maintainAspectRatio: false,
            responsive: true,
            plugins: {
                legend: { display: false },
                tooltip: { enabled: false }
            },
            scales: {
                x: {
                    grid: { display: false, drawBorder: false },
                    ticks: { color: '#6c7a93', font: { size: 13 } }
                },
                y: {
                    beginAtZero: true,
                    max: 12,
                    ticks: {
                        stepSize: 2,
                        color: '#6c7a93',
                        font: { size: 13 }
                    },
                    grid: { color: 'rgba(17, 16, 29, 0.08)', drawBorder: false }
                }
            }
        }
    });
}

function renderUpcomingTasks() {
    const container = document.getElementById('upcoming-tasks-list');
    if (!container) return;

    const tasks = [
        { title: 'Design Onboarding Flow', details: 'Mobile App Redesign · Due 22 May 2025', priority: 'High', badge: 'high' },
        { title: 'Create UI Component Library', details: 'Design System · Due 28 May 2025', priority: 'High', badge: 'high' },
        { title: 'User Research Report', details: 'Research Initiative · Due 25 May 2025', priority: 'Medium', badge: 'medium' },
        { title: 'Prototype Dashboard v2', details: 'Internal Tools · Due 30 May 2025', priority: 'Medium', badge: 'medium' }
    ];

    container.innerHTML = tasks.map(task => `
        <div class="task-row">
            <div>
                <h4>${task.title}</h4>
                <p>${task.details}</p>
            </div>
            <span class="status-pill status-pill--${task.badge}">${task.priority}</span>
        </div>
    `).join('');
}

const apps = [
  { company: 'Petronas Digital',     position: 'UI/UX Designer Intern',    status: 'Accepted',  date: '15 Jan 2025' },
  { company: 'Accenture Malaysia',   position: 'Frontend Developer Intern', status: 'Interview', date: '10 Jan 2025' },
  { company: 'Maxis Communications', position: 'Mobile Dev Intern',         status: 'Rejected',  date: '5 Jan 2025'  },
  { company: 'Maybank',              position: 'Digital Product Intern',    status: 'Applied',   date: '20 Jan 2025' }
];

function badgeFor(status) {
  const colourMap = {
    'Accepted':  'badge-teal',
    'Interview': 'badge-amber',
    'Rejected':  'badge-red',
    'Applied':   'badge-blue'
  };
  const css = colourMap[status] || 'badge-blue';
  return `<span class="badge ${css}"><span class="badge-dot"></span>${status}</span>`;
}

function renderApps(data) {
  const tbody = document.getElementById('app-tbody');
  if (!tbody) return;

  const html = data.map((a) => `
    <tr>
      <td><strong>${a.company}</strong></td>
      <td>${a.position}</td>
      <td>${badgeFor(a.status)}</td>
      <td style="color:var(--text-muted)">${a.date}</td>
      <td><a href="app_details.php" class="btn btn-sm btn-outline">View</a></td>
    </tr>
  `).join('');

  tbody.innerHTML = html;
}

function filterApplications() {
  const val = document.getElementById('filter-status').value;
  const filtered = (val === 'all') ? apps : apps.filter((a) => a.status === val);
  renderApps(filtered);
}

const tasks = [
  { name: 'Design Onboarding Flow', project: 'Mobile App Redesign', deadline: '22 May 2025', priority: 'High', status: 'In Progress', progress: 65 },
  { name: 'Create UI Component Library', project: 'Design System', deadline: '28 May 2025', priority: 'High', status: 'In Progress', progress: 40 },
  { name: 'User Research Report', project: 'Research Initiative', deadline: '25 May 2025', priority: 'Medium', status: 'To Do', progress: 10 },
  { name: 'Prototype Dashboard v2', project: 'Internal Tools', deadline: '30 May 2025', priority: 'Medium', status: 'To Do', progress: 0 },
  { name: 'Accessibility Audit', project: 'Mobile App Redesign', deadline: '1 Jun 2025', priority: 'Low', status: 'To Do', progress: 0 },
  { name: 'Weekly Progress Report', project: 'Admin', deadline: '17 May 2025', priority: 'High', status: 'Completed', progress: 100 },
  { name: 'Stakeholder Presentation', project: 'Mobile App Redesign', deadline: '10 May 2025', priority: 'High', status: 'Completed', progress: 100 },
  { name: 'Competitor Analysis', project: 'Research Initiative', deadline: '5 May 2025', priority: 'Medium', status: 'Completed', progress: 100 }
];

const logbookEntries = [
  { date: '20 May 2025', text: 'Completed screen designs for the onboarding flow and reviewed with supervisor.' },
  { date: '19 May 2025', text: 'Gathered user feedback and updated the dashboard wireframes based on suggestions.' }
];

function getProgressClass(progress) {
  if (progress >= 80) return 'task-progress-bar--green';
  if (progress >= 40) return 'task-progress-bar--amber';
  return 'task-progress-bar--red';
}

function renderTasks(data) {
  const tbody = document.getElementById('tasks-tbody');
  if (!tbody) return;

  const html = data.map((task) => {
    const progressClass = getProgressClass(task.progress);
    return `
      <tr>
        <td>${task.name}</td>
        <td>${task.project}</td>
        <td>${task.deadline}</td>
        <td>${task.priority}</td>
        <td>${task.status}</td>
        <td>
          <div class="task-progress-cell">
            <div class="task-progress-label"><span>${task.progress}%</span></div>
            <div class="task-progress-wrap">
              <div class="task-progress-bar ${progressClass}" style="width:${task.progress}%"></div>
            </div>
          </div>
        </td>
      </tr>
    `;
  }).join('');

  tbody.innerHTML = html;
}

function filterTasks() {
  const priority = document.getElementById('filter-priority').value;
  const status = document.getElementById('filter-task-status').value;
  const filtered = tasks.filter((task) => {
    const matchesPriority = priority === 'all' || task.priority === priority;
    const matchesStatus = status === 'all' || task.status === status;
    return matchesPriority && matchesStatus;
  });
  renderTasks(filtered);
}

function renderLogbook() {
  const container = document.getElementById('logbook-list');
  if (!container) return;

  container.innerHTML = logbookEntries.map((entry) => `
    <div class="logbook-entry">
      <div class="logbook-date">${entry.date}</div>
      <p>${entry.text}</p>
    </div>
  `).join('');
}

function addLogEntry() {
  const date = document.getElementById('log-date').value;
  const text = document.getElementById('log-text').value.trim();
  if (!date || !text) {
    alert('Please add a date and description for the log entry.');
    return;
  }

  logbookEntries.unshift({ date, text });
  renderLogbook();
  document.getElementById('log-text').value = '';
}

function initReportCharts() {
  if (typeof Chart === 'undefined') return;

  // =========================
  // Weekly Working Hours
  // =========================
  var hoursChart = document.getElementById('chart-hours');

  if (hoursChart) {
    new Chart(hoursChart, {
      type: 'bar',
      data: {
        labels: ['Wk1', 'Wk2', 'Wk3', 'Wk4', 'Wk5', 'Wk6', 'Wk7', 'Wk8'],
        datasets: [{
          data: [38, 40, 42, 39, 44, 41, 43, 40],
          backgroundColor: 'rgba(15, 157, 122, 0.18)',
          borderColor: '#0f9d7a',
          borderWidth: 2,
          borderRadius: 8,
          borderSkipped: false,
          hoverBackgroundColor: 'rgba(15, 157, 122, 0.28)'
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false
          }
        },
        scales: {
          x: {
            grid: {
              display: false
            },
            ticks: {
              color: '#666',
              font: {
                family: 'Inter',
                size: 12
              }
            }
          },
          y: {
            beginAtZero: true,
            max: 45,
            ticks: {
              stepSize: 5,
              color: '#666',
              font: {
                family: 'Inter',
                size: 12
              }
            },
            grid: {
              color: 'rgba(0,0,0,0.06)'
            }
          }
        }
      }
    });
  }

  // =========================
  // Attendance Doughnut Chart
  // =========================
  var attendanceChart = document.getElementById('chart-attendance');

  if (attendanceChart) {
    new Chart(attendanceChart, {
      type: 'doughnut',
      data: {
        labels: ['Present', 'Absent', 'MC'],
        datasets: [{
          data: [90, 5, 5],
          backgroundColor: [
            '#0f9d7a',
            '#c53030',
            '#d68910'
          ],
          borderWidth: 0
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        cutout: '65%',
        plugins: {
          legend: {
            position: 'bottom',
            labels: {
              boxWidth: 18,
              padding: 15,
              font: {
                family: 'Inter',
                size: 12
              }
            }
          }
        }
      }
    });
  }

  // =========================
  // Skills Radar Chart
  // =========================
  var radarChart = document.getElementById('chart-radar');

  if (radarChart) {
    new Chart(radarChart, {
      type: 'radar',
      data: {
        labels: [
          'HTML/CSS',
          'JavaScript',
          'Figma/UI',
          'React',
          'Communication',
          'Problem Solving'
        ],
        datasets: [{
          data: [85, 65, 90, 60, 78, 72],
          backgroundColor: 'rgba(15, 157, 122, 0.18)',
          borderColor: '#0f9d7a',
          borderWidth: 2,
          pointBackgroundColor: '#0f9d7a',
          pointBorderColor: '#0f9d7a',
          pointRadius: 4
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false
          }
        },
        scales: {
          r: {
            beginAtZero: true,
            min: 0,
            max: 100,
            ticks: {
              stepSize: 20,
              backdropColor: 'transparent',
              color: '#777'
            },
            pointLabels: {
              color: '#666',
              font: {
                family: 'Inter',
                size: 12
              }
            },
            grid: {
              color: 'rgba(0,0,0,0.08)'
            },
            angleLines: {
              color: 'rgba(0,0,0,0.08)'
            }
          }
        }
      }
    });
  }
}

function toggleNotif() {
    const panel = document.getElementById('notifPanel');
    if (!panel) return;
    panel.classList.toggle('open');
}

function clearNotifications() {
    const list = document.querySelector('.notif-list');
    const empty = document.getElementById('notifEmpty');
    const clearBtn = document.getElementById('notifClearBtn');
    if (list) list.innerHTML = '';
    if (empty) empty.style.display = 'block';
    if (clearBtn) clearBtn.style.display = 'none';
}

document.addEventListener('click', (event) => {
    const panel = document.getElementById('notifPanel');
    if (!panel || !panel.classList.contains('open')) return;
    const clickedInside = event.target.closest('#notifPanel') || event.target.closest('.topbar-icon-btn');
    if (!clickedInside) {
        panel.classList.remove('open');
    }
});

