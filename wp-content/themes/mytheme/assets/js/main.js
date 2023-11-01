$(document).ready(function () {

	$('#ranking_nav').addClass('active');


	function redirectNav() {
		$('#ranking_nav').on('click', function () {
			let check_ranking_button = $(this).hasClass('active');
			if (!check_ranking_button) {
				$(this).addClass('active');
				$('#overview_nav').removeClass('active');
				$('#table-ranking').css('display', 'block');
				$('#calendar-block').css('display', 'block');
				$('#image-list-block').css('display', 'none');
			}
		});

		$('#overview_nav').on('click', function () {
			let check_ranking_button = $(this).hasClass('active');
			if (!check_ranking_button) {
				$(this).addClass('active');
				$('#ranking_nav').removeClass('active');
				$('#table-ranking').css('display', 'none');
				$('#calendar-block').css('display', 'none');
				$('#image-list-block').css('display', 'block');
			}
		})
	}

	function renderCalendarAndData() {
		renderOptionYearAnhMonth(2019);
		const d = new Date();
		let month = d.getMonth() + 1;
		let year = d.getFullYear();
		if (month < 10) {
			$(`#selectYearMonth option[value ='${year}-0${month}']`).attr("selected", "selected");
			// htmlOption += `<option value="${yearStart + i}-0${j}">${j}月 ${yearStart + i}</option>`;
		} else {
			$(`#selectYearMonth option[value ='${year}-${month}']`).attr("selected", "selected");
			// htmlOption += `<option value="${yearStart + i}-${j}">${j}月 ${yearStart + i}</option>`;
		}
		renderDateTable(month, year);
		$.ajax({
			url: "http://meo.test/wp-content/themes/mytheme/getdataservice.php",
			data: { cmd: "get_all" },
			type: 'POST',
			dataType: 'json',
		}).done(function (data) {
			$('#calendar').fullCalendar({
				header: {
					left: 'prev, next today',
					center: 'title',
					right: ''
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

			data.forEach(element => {
				// console.log(element.start);
				let htmlKeyRank = `<div>${element.ranking}</div>`
				$(`#rank-key-${element.start}`).append(htmlKeyRank);
			});
		}).fail(function (jqxhr) {
			console.log(jqxhr);
		});
	}


	function renderOptionYearAnhMonth(yearStart) {
		const currentTime = new Date();
		const lengthYear = currentTime.getFullYear() - yearStart;
		let htmlOption = "";
		for (let i = 0; i <= lengthYear; i++) {
			for (let j = 1; j <= 12; j++) {
				if (j < 10) {
					htmlOption += `<option value="${yearStart + i}-0${j}">${j}月 ${yearStart + i}</option>`;
				} else {
					htmlOption += `<option value="${yearStart + i}-${j}">${j}月 ${yearStart + i}</option>`;
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
			html += `<tr id="${element}"><th scope="row">${element}</th>
						<td id="rank-key-${element}"></td>
						<td id="image-${element}"></td></tr>`;

		});
		$('#content-table').html(html);
	}



	function getDataByMonthAndYear() {
		return $("#selectYearMonth").on("change", function (e) {
			let data = $("#selectYearMonth").val();
			let yearAndMonth = data.split('-');
			renderDateTable(yearAndMonth[1], yearAndMonth[0]);
			$.ajax({
				type: 'POST',
				url: 'http://meo.test/wp-content/themes/mytheme/getdataservice.php',
				data: {
					monthAndYear: data,
					cmd: 'getDataByMonthAndYear'
				},
				dataType: 'json'
			}).done(function (data) {
				let yearAndMonth = $("#selectYearMonth").val();
				let yearAndMonthArr = yearAndMonth.split('-');
				// console.log(yearAndMonthArr);
				$('#calendar').fullCalendar({
					header: {
						left: 'prev, next today',
						center: 'title',
						right: ''
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
					year: yearAndMonthArr[0],
					month: yearAndMonthArr[1],
					// initialDate: dayAndMonth,
					dayNames: ['日曜日', '月曜日', '火曜日', '水曜日', '木曜日', '金曜日', '土曜日'],

					dayNamesShort: ['日', '月', '火', '水', '木', '金', '土'],

					selectable: true,

					selectHelper: true,
					events: data
				});
				$('#calendar').fullCalendar('gotoDate', yearAndMonth);
				data.forEach(element => {
					let currentDate = new Date(element.start);
					let year = currentDate.getFullYear();
					let month = currentDate.getMonth() + 1;
					let day = currentDate.getDate();

					console.log(element);

					let htmlKeyRank = `<div>${element.keywordNo}</div>`;
					let htmlImage = '';
					if (month >= 10) {
						htmlImage += `<div>${element.keyword} <a href="https://ranktool-meo-center.com/RankingImages/${year}/${year}${month}/${year}${month}${day}/${element.keywordNo}.jpg">image ranking</a> </div>`
					} else {
						htmlImage += `<div>${element.keyword} <a href="https://ranktool-meo-center.com/RankingImages/${year}/${year}0${month}/${year}0${month}${day}/${element.keywordNo}.jpg">image ranking</a> </div>`
					}
					$(`#rank-key-${element.start}`).append(htmlKeyRank);
					$(`#image-${element.start}`).append(htmlImage);
					// console.log(`rank-key-${element.start}`);
					console.log($(`#rank-key-${element.start}`));
				});
			}).fail(function (jqxhr) {
				console.log(jqxhr);
			});
		})
	}

	function getImageByMonthAndYear() {
		$("#selectYearMonth").on("change", function (e) {
			let data = $("#selectYearMonth").val();
			let yearAndMonth = data.split('-');
			renderDateTable(yearAndMonth[1], yearAndMonth[0]);
			$.ajax({
				type: 'POST',
				url: 'http://meo.test/wp-content/themes/mytheme/getdataservice.php',
				data: {
					monthAndYear: data,
					cmd: 'getDataByMonthAndYear'
				},
				dataType: 'json'
			}).done(function (data) {
				let yearAndMonth = $("#selectYearMonth").val();
				let yearAndMonthArr = yearAndMonth.split('-');
				// console.log(yearAndMonthArr);
				data.forEach(element => {
					let currentDate = new Date(element.start);
					let year = currentDate.getFullYear();
					let month = currentDate.getMonth() + 1;
					let day = currentDate.getDate();
					console.log(element);


					let htmlImage = '';
					if (month >= 10) {
						htmlImage += `<div style="margin-top:50px;"><img src="https://ranktool-meo-center.com/RankingImages/${year}/${year}${month}/${year}${month}${day}/${element.keywordNo}.jpg"></div>`
					} else {
						htmlImage += `<div style="margin-top:50px;"><img src="https://ranktool-meo-center.com/RankingImages/${year}/${year}0${month}/${year}0${month}${day}/${element.keywordNo}.jpg"></div>`
					}
					$(`#image-list`).append(htmlImage);
					console.log(`rank-key-${element.start}`);
				});
			}).fail(function (jqxhr) {
				console.log(jqxhr);
			});
		})
	}

	function loadFunction() {

		renderCalendarAndData();
		getDataByMonthAndYear();
		getImageByMonthAndYear();
		redirectNav();
	}

	loadFunction();

	// renderOptionYearAnhMonth(2019);

});