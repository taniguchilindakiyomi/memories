/******/ (() => { // webpackBootstrap
/*!**********************************!*\
  !*** ./resources/js/memories.js ***!
  \**********************************/
document.addEventListener('DOMContentLoaded', function () {
  var calendar = document.getElementById('calendar');
  var currentDate = new Date();
  function createCalendar() {
    // 現在表示している年月
    var year = currentDate.getFullYear();
    var month = currentDate.getMonth();

    // 月の1日が何曜日か
    var firstDay = new Date(year, month, 1).getDay();

    // その月が何日まであるか
    var lastDate = new Date(year, month + 1, 0).getDate();

    // 前月が何日まであるか
    var previousLastDate = new Date(year, month, 0).getDate();

    // カレンダーを空にする
    calendar.innerHTML = '';

    // ==============================
    // カレンダーのヘッダー
    // ==============================

    var header = document.createElement('div');
    header.className = 'calendar__header';
    var prevButton = document.createElement('button');
    prevButton.className = 'calendar__arrow';
    prevButton.textContent = '＜';
    var title = document.createElement('span');
    title.className = 'calendar__title';
    title.textContent = "".concat(year, "\u5E74").concat(month + 1, "\u6708");
    var nextButton = document.createElement('button');
    nextButton.className = 'calendar__arrow';
    nextButton.textContent = '＞';
    header.appendChild(prevButton);
    header.appendChild(title);
    header.appendChild(nextButton);
    calendar.appendChild(header);

    // ==============================
    // カレンダーの表
    // ==============================

    var table = document.createElement('table');
    table.className = 'calendar__table';

    // 曜日
    var thead = document.createElement('thead');
    var weekRow = document.createElement('tr');
    var weeks = ['日', '月', '火', '水', '木', '金', '土'];
    weeks.forEach(function (week, index) {
      var th = document.createElement('th');
      th.textContent = week;
      if (index === 0) {
        th.className = 'sun';
      }
      if (index === 6) {
        th.className = 'sat';
      }
      weekRow.appendChild(th);
    });
    thead.appendChild(weekRow);
    table.appendChild(thead);

    // ==============================
    // 日付
    // ==============================

    var tbody = document.createElement('tbody');
    var date = 1;

    // 最大6週間
    for (var row = 0; row < 6; row++) {
      var tr = document.createElement('tr');
      for (var col = 0; col < 7; col++) {
        var td = document.createElement('td');

        // 前月の日付
        if (row === 0 && col < firstDay) {
          var previousDate = previousLastDate - firstDay + col + 1;
          td.textContent = previousDate;
          td.className = 'gray';
        }

        // 今月の日付
        else if (date <= lastDate) {
          var link = document.createElement('a');
          link.textContent = date;

          // 年月日を作成
          var monthText = String(month + 1).padStart(2, '0');
          var dayText = String(date).padStart(2, '0');
          var selectedDate = "".concat(year, "-").concat(monthText, "-").concat(dayText);

          // create画面へ
          link.href = "/create?date=".concat(selectedDate);
          td.appendChild(link);

          // 日曜日
          if (col === 0) {
            td.classList.add('sun');
          }

          // 土曜日
          if (col === 6) {
            td.classList.add('sat');
          }

          // 今日の日付
          var today = new Date();
          if (year === today.getFullYear() && month === today.getMonth() && date === today.getDate()) {
            td.classList.add('today');
          }
          date++;
        }

        // 翌月の日付
        else {
          var nextDate = date - lastDate;
          td.textContent = nextDate;
          td.className = 'gray';
          date++;
        }
        tr.appendChild(td);
      }
      tbody.appendChild(tr);

      // その月が終わったら終了
      if (date > lastDate) {
        break;
      }
    }
    table.appendChild(tbody);
    calendar.appendChild(table);

    // ==============================
    // 前月ボタン
    // ==============================

    prevButton.addEventListener('click', function () {
      currentDate.setMonth(currentDate.getMonth() - 1);
      createCalendar();
    });

    // ==============================
    // 翌月ボタン
    // ==============================

    nextButton.addEventListener('click', function () {
      currentDate.setMonth(currentDate.getMonth() + 1);
      createCalendar();
    });
  }

  // 最初にカレンダーを作る
  createCalendar();
  var toggleBtn = document.getElementById('search-toggle-btn');
  var searchForm = document.getElementById('search-form');
  if (toggleBtn && searchForm) {
    toggleBtn.addEventListener('click', function () {
      searchForm.classList.toggle('is-open');
      if (searchForm.classList.contains('is-open')) {
        searchForm.querySelector('input').focus();
      }
    });
  }
});
/******/ })()
;