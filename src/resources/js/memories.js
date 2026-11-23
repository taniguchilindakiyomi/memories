document.addEventListener('DOMContentLoaded', function () {

    const calendar = document.getElementById('calendar');

    let currentDate = new Date();

    function createCalendar() {

        // 現在表示している年月
        const year = currentDate.getFullYear();
        const month = currentDate.getMonth();

        // 月の1日が何曜日か
        const firstDay = new Date(year, month, 1).getDay();

        // その月が何日まであるか
        const lastDate = new Date(year, month + 1, 0).getDate();

        // 前月が何日まであるか
        const previousLastDate = new Date(year, month, 0).getDate();

        // カレンダーを空にする
        calendar.innerHTML = '';

        // ==============================
        // カレンダーのヘッダー
        // ==============================

        const header = document.createElement('div');
        header.className = 'calendar__header';

        const prevButton = document.createElement('button');
        prevButton.className = 'calendar__arrow';
        prevButton.textContent = '＜';

        const title = document.createElement('span');
        title.className = 'calendar__title';
        title.textContent = `${year}年${month + 1}月`;

        const nextButton = document.createElement('button');
        nextButton.className = 'calendar__arrow';
        nextButton.textContent = '＞';

        header.appendChild(prevButton);
        header.appendChild(title);
        header.appendChild(nextButton);

        calendar.appendChild(header);

        // ==============================
        // カレンダーの表
        // ==============================

        const table = document.createElement('table');
        table.className = 'calendar__table';

        // 曜日
        const thead = document.createElement('thead');
        const weekRow = document.createElement('tr');

        const weeks = ['日', '月', '火', '水', '木', '金', '土'];

        weeks.forEach(function (week, index) {

            const th = document.createElement('th');

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

        const tbody = document.createElement('tbody');

        let date = 1;

        // 最大6週間
        for (let row = 0; row < 6; row++) {

            const tr = document.createElement('tr');

            for (let col = 0; col < 7; col++) {

                const td = document.createElement('td');

                // 前月の日付
                if (row === 0 && col < firstDay) {

                    const previousDate =
                        previousLastDate - firstDay + col + 1;

                    td.textContent = previousDate;
                    td.className = 'gray';

                }

                // 今月の日付
                else if (date <= lastDate) {

                    const link = document.createElement('a');

                    link.textContent = date;

                    // 年月日を作成
                    const monthText = String(month + 1).padStart(2, '0');
                    const dayText = String(date).padStart(2, '0');

                    const selectedDate =
                        `${year}-${monthText}-${dayText}`;

                    // create画面へ
                    link.href =
                        `/create?date=${selectedDate}`;

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
                    const today = new Date();

                    if (
                        year === today.getFullYear() &&
                        month === today.getMonth() &&
                        date === today.getDate()
                    ) {
                        td.classList.add('today');
                    }

                    date++;

                }

                // 翌月の日付
                else {

                    const nextDate =
                        date - lastDate;

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

 
   const toggleBtn = document.getElementById('search-toggle-btn');
   const searchForm = document.getElementById('search-form');

   if (toggleBtn && searchForm) {
       toggleBtn.addEventListener('click', () => {
           searchForm.classList.toggle('is-open');

           if (searchForm.classList.contains('is-open')) {
               searchForm.querySelector('input').focus();
           }
       });
   }


});