$(document).ready(function () {
	// let data = @json($events);
	$.ajax({
		url: "http://meo.test/wp-content/themes/mytheme/getdataservice.php",
		data: { cmd: "get_all" },
		type: 'POST',
		dataType: 'json',
	}).done(function (data) {
		// JSON.parse(data);
		console.log(data);
		$('#calendar').fullCalendar({
			header: {
				left: 'prev, next today',
				center: 'title',
				right: 'month, agendaWeek, agendaDay'
			},
			buttonText: {
				prevYear: '&laquo;', // <<
				nextYear: '&raquo;', // >>
				today: '今日',
				month: '月',
				week: '週',
				day: '日'
			},

			monthNames: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],

			monthNamesShort: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月',
				'12月'
			],

			dayNames: ['日曜日', '月曜日', '火曜日', '水曜日', '木曜日', '金曜日', '土曜日'],

			dayNamesShort: ['日', '月', '火', '水', '木', '金', '土'],

			selectable: true,

			selectHelper: true,
			events: data
		});
		renderOptionYearAnhMonth(2019);

		
		const d = new Date();
		let month = d.getMonth() + 1;
		let year = d.getFullYear();

		if (month < 10) {
			$(`#selectYearMonth option[value ='${year}-0${month}']`).attr("selected","selected");
			// htmlOption += `<option value="${yearStart + i}-0${j}">${j}月 ${yearStart + i}</option>`;
		} else {
			$(`#selectYearMonth option[value ='${year}-${month}']`).attr("selected","selected");
			// htmlOption += `<option value="${yearStart + i}-${j}">${j}月 ${yearStart + i}</option>`;
		}
	
		renderDateTable(month, year, data);
	}).fail(function (jqxhr) {
		console.log(jqxhr);
	});



	// calendar.render();

	function renderOptionYearAnhMonth(yearStart) {
		const currentTime = new Date();
		const lengthYear = currentTime.getFullYear() - yearStart;
		let htmlOption = "";
		for (let i = 0; i <= lengthYear; i++) {
			for (let j = 1; j <= 12; j++) {
				if (j < 10) {
					htmlOption += `<option id="${yearStart + i}-0${j}" value="${yearStart + i}-0${j}">${j}月 ${yearStart + i}</option>`;
				} else {
					htmlOption += `<option id="${yearStart + i}-${j}" value="${yearStart + i}-${j}">${j}月 ${yearStart + i}</option>`;
				}
			}
		}
		$("#selectYearMonth").html(htmlOption);
	}

	function getDaysInMonth(month, year) {
		let date = new Date(year, month, 1);
		let days = [];
		while (date.getMonth() === month) {
			days.push(new Date(date).toLocaleDateString('sv'));
			date.setDate(date.getDate() + 1);
		}
		return days.reverse();
	}


	function renderDateTable(month, year, data) {
		let listDay = getDaysInMonth(parseInt(month) - 1, year);
		let html;
		listDay.forEach(element => {
			html += `<tr><th scope="row" id="${element}">${element}</th>
						<td>Jacob</td>
						<td>Thornton</td></tr>`;

		});
		$('#content-table').html(html);
	}




	$("#selectYearMonth").on("change", function (e) {
		let data = $("#selectYearMonth").val();

		let yearAndMonth = data.split('-');
		console.log(yearAndMonth);
		renderDateTable(yearAndMonth[1], yearAndMonth[0]);
		$.ajax({
			type: 'POST',
			url: 'http://meo.test/wp-content/themes/mytheme/getdataservice.php',
			data: {
				monthAndYear: data,
				cmd: 'getDataByMonthAndYear'
			}
		}).done(function (data) {
			renderDateTable(yearAndMonth[1], yearAndMonth[0], data);
			console.log(data);
		}).fail(function (jqxhr) {
			console.log(jqxhr);
		});
	})


		// renderOptionYearAnhMonth(2019);

});