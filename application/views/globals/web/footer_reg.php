<!-- footer start-->
<!-- Site footer -->
<style>
	#mypop .modal-header {
		background-color: #ccc;
		padding: 1.5rem !important;
	}

	#mypop .modal-body {
		padding: 20px 60px;
	}

	#mypop .modal-body img {
		margin: 12px auto;
		margin-bottom: 25px;
	}

	#mypop .modal-body a {
		display: block;
		width: 100%;
		border: 2px solid #fff;
		box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
		padding: 10px 10px;
		border-radius: 15px;
		text-align: center;
		color: #fff;
		font-size: 17px;
	}

	.bt1 {
		background-color: orange;
	}

	#mypop .modal-body button {
		display: block;
		width: 100%;
		border: 2px solid #fff;
		box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
		padding: 10px 10px;
		border-radius: 15px;
		text-align: center;
		color: #fff;
		font-size: 17px;
		cursor: pointer;
	}

	#mypop .modal-body button span {
		background: orange;
		display: inline-block;
		color: #fff;
		padding: 0 5px;
		margin-right: 3px;
	}

	.bt2 {
		background-color: #007bff;
		margin-top: 20px;
	}

	.bor-gr {
		border-color: orange !important;
	}

	.ft_img {
		width: 70px;
		height: 50px;
	}

	@media(max-width:680px) {
		.nw-footer-list {
			text-align: left !important;
		}

		.nw-footer-list .nw-img {
			margin: 0 !important;
		}

		.footer-pdg .ft-lst {
			text-align: left !important;
		}

		.footer-pdg .ft-lst .nw-ft-img {
			float: left;
			width: 30%;
		}

		.footer-pdg .ft-lst .li-list-nw .footer-align {
			float: left;
		}

		.nw-footer-list li::after {
			right: unset;
		}
	}
</style>
<section class="">
	<footer class="site-footer">
		<div class="container-fluid footer_inner">
			<div class="row align-items-center">
				<div class="col-sm-12 col-md-4 footer-pdg">
					<!-- <h3 style="margin-bottom:10px;font-size:18px;font-weight:400;padding-top: 27px;color:#fff;">More from us:</h3>
					<div class="row">
						<div class="col-md-4 col-sm-4 col-4"><img class="ft_img" src="<?php echo base_url(); ?>assets/footer_img/logos/touchcode.svg" style="width:92px;"></div>
						<div class="col-md-4 col-sm-4 col-4"><img class="ft_img" src="<?php echo base_url(); ?>assets/footer_img/logos/ogo.svg" style="width:63px;"></div>
						<div class="col-md-4 col-sm-4 col-4 p-0"><img class="ft_img" src="<?php echo base_url(); ?>assets/footer_img/logos/nbse.svg" style="width:63px"></div>
						<div class="col-md-4 col-sm-4 col-4"><img class="ft_img" src="<?php echo base_url(); ?>assets/footer_img/logos/atl.svg" style="width:40px;"></div>
						<div class="col-md-4 col-sm-4 col-4"><img class="ft_img" src="<?php echo base_url(); ?>assets/footer_img/logos/mindmaps.svg" style="width:77px;"></div>
					</div> -->
				</div>

				<div class="col-sm-12 col-md-4 footer-pdg">
					<ul class="footer-links text-center nw-footer-list">
						<li>
							<h3 style="color: white;">Brightshine Digital</h3>
						</li>
						<li style="color:#eee;"><?php echo $address[0]->value ?><br>
							<i class="fa fa-envelope"></i> <?php echo $email1[0]->value  ?> &nbsp&nbsp; <i class="fa fa-phone"></i> <?php echo $mobile1[0]->value ?>
						</li>
						<li style="color:#eee;margin-top:3px;font-size:11px;margin-bottom:3px;">Copyright &copy; <?= date('Y') ?> All rights reserved Brightshine Digital</li>
					</ul>
				</div>
				<div class="col-sm-12 col-md-4 footer-pdg">
					<ul class="footer-links text-right ft-lst">
						<li class="li-list-nw">
							<img style="background-color: white; border: 8px solid white; border-radius:5px" class="nw-ft-img" src="assets/img/<?php echo $footer_logo['file_name']; ?>">
						</li>
						<li class="li-list-nw">
							<ul class="footer-align mb-2">
								<li class=""><a class="ftr-icon" href="#"><i class="fa fa-facebook"></i></a></li>
								<li class=""><a class="ftr-icon" href="#"><i class="fa fa-instagram"></i></a></li>
								<li class=""><a class="ftr-icon" href="#"><i class="fa fa-youtube-play"></i></a></li>
								<li class=""><a class="ftr-icon" href="#"><i class="fa fa-linkedin"></i></a></li>
							</ul>
						</li>
						<li class="li-list-nw" style="color: white;">Be in touch with us on social media<br>for latest updates</li>
					</ul>
				</div>

	</footer>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function() {
			$("#India").hide();
			$("#Others").hide();

			$("#country_type").on('change', function() {

				var country = $(this).val();

				if (country == '105') {
					//alert(country);
					$("#India").show();
					$("#Others").hide();

					//var valueSelected = this.value;
					$.ajax({
						url: '<?= base_url(); ?>' + '/admin_master/get_states',
						method: 'post',
						data: {
							bid: country
						},
						// dataType: 'json',
						success: function(response) {
							$('#state').html(response);

						}
					});

				}

				if (country == '106') {
					$("#Others").show();
					$("#India").hide();
				}

			});

		});
	</script>

	<script>
		$('#stu_class').on('change', function(e) {
			//var optionSelected = $("option:selected", this);
			var valueSelected = this.value;
			// alert(valueSelected);
			$.ajax({
				url: '<?= base_url(); ?>' + '/admin_master/get_sectionName_reg',
				method: 'post',
				data: {
					bid: valueSelected
				},
				// dataType: 'json',
				success: function(response) {
					$('#stu_section_name').html(response);
					//var len = response.length;	
					//alert(len);		
				}
			});
		});

		// $('#board').on('change', function(e) {
		// 	var valueSelected = this.value;
		// 	$.ajax({
		// 		url: '<?= base_url(); ?>' + '/admin_master/get_series',
		// 		method: 'post',
		// 		data: {
		// 			bid: valueSelected
		// 		},
		// 		// dataType: 'json',
		// 		success: function(response) {
		// 			$('#ser_section').html(response);
		// 			//var len = response.length;	
		// 			//alert(len);		
		// 		}
		// 	});
		// });


		$('#state').on('change', function(e) {
			var valueSelected = this.value;
			// alert(valueSelected);
			$.ajax({
				url: '<?= base_url(); ?>' + '/admin_master/get_cities',
				method: 'post',
				data: {
					bid: valueSelected
				},
				success: function(response) {
					$('#city').html(response);
				}
			});
		});


		// var checkedClasses = [];
		// var seriesOfSelectedBoard;
		// var seriesSelect;
		// var seriesCount;
		var subjectSeriesSelectArr = [];
		var currClasses;
		// Series on selection of Board
		$('#board').on('change', function(e) {
			$('#seriesClassesContainer').html(`<div class="col-lg-12 p-2"><select class="form-control series-select" id="series"><option value="" disabled selected>Select Series (you can select multiple series, but only one title for a class)</option></select></div>`);
			// $('#series').html('<option value="" disabled selected>Select Series</option>');
			var valueSelected = this.value;
			const url = '<?= base_url(); ?>' + 'admin_master/get_series_mod/' + valueSelected;
			fetch(url).then(res => res.json()).then(data => {
				// seriesOfSelectedBoard = data;
				// seriesCount = data.length;
				// console.log(seriesCount);
				data.forEach((item, index, arr) => {
					let options = `<option value="${item.id}">${item.name}</option>`;
					$('#series').append(options);
				});
			});
			// checkedClasses = [];
		});

		// Subject's Series on selection of Subject
		$('#seriesClassesContainer').on('change', 'div select:first', function(e) {
			var valueSelected = this.value;
			var seriesContainerID = valueSelected + 'SeriesContainer';
			classesContainerID = valueSelected + 'ClassesContainer';
			$(this).next().next('div').remove();
			$(this).next('div').remove();
			$(this).parent().append(`<div class="row m-0 series-classes-container pb-2 justify-content-center" id="${seriesContainerID}">Loading Series...</div>`);
			$(this).parent().append(`<div class="hidden row m-0 series-classes-container pb-2 justify-content-center" id="${classesContainerID}">Loading Classes...</div>`);
			const url = '<?= base_url(); ?>' + 'admin_master/get_subject_series/' + valueSelected;
			fetch(url).then(res => res.json()).then(data => {
				let subjectSeriesSelect = '<select id="subjectSeriesSelect" class="form-control series-select"><option value="" disabled Selected>Select Series</option>';
				// console.log(data);
				// let classesCheckBox = '';
				data.forEach((item, index, arr) => {
					if (!subjectSeriesSelectArr.includes(item.id)) subjectSeriesSelect += `<option value="${item.id}">${item.name}</option>`;
					// if (!checkedClasses.includes(item.class)) {
					// classesCheckBox += `<span class="col-md-2"><input class="m-1 ${valueSelected}classes" type="checkbox" id="${valueSelected+item.class}" value="${item.class}"><label for="${valueSelected+item.class}" class="m-1">Class ${item.class}</label></span>`;
					// }
				});
				subjectSeriesSelect += '</select>';
				$('#' + seriesContainerID).html(subjectSeriesSelect);
				// $('#' + classesContainerID).html(classesCheckBox);
				// console.log($('#' + seriesContainerID + ' span').length);
				// if ($('#' + seriesContainerID + ' span').length == 1) {
				// 	$('#' + seriesContainerID).html('<p class="text-danger text-center">You have already selected available classes with other series, please remove your current selection and reload the page if you want to select this title.</p>');
				// };
				// $('#addSeries').off('click');
			});

			const url2 = '<?= base_url(); ?>' + 'admin_master/get_series_classes/' + valueSelected;
			fetch(url2).then(res => res.json()).then(data => {
				let classesCheckBox = '';
				currClasses = data;
				data.forEach((item, index, arr) => {
					// if (!checkedClasses.includes(item.class)) {
					classesCheckBox += `<span class="col-md-3"><input class="m-1 ${valueSelected}classes" type="checkbox" id="${valueSelected+item.id}" value="${item.id}"><label for="${valueSelected+item.id}" class="m-1">${item.name}</label></span>`;
					// }
				});
				classesCheckBox += '<div style="margin: 2rem 1.5rem 0 auto;"><span class="btn btn-sm btn-dark px-3" id="addSeries">Add</span></div>';
				// subjectSeriesClasses = classesCheckBox;
				$('#' + classesContainerID).html(classesCheckBox);
			});
		});

		// Classes on selection of Series
		// var subjectSeriesClasses;
		// var classesContainerID;
		// $('#seriesClassesContainer').on('change', 'div select', function(e) {
		// var valueSelected = this.value;
		// var seriesContainerID = valueSelected + 'SeriesContainer';
		// classesContainerID = valueSelected + 'ClassesContainer';
		// $(this).last('div').remove();
		// $(this).parent().append(`<div class="d-none row m-0 series-classes-container pb-2 justify-content-center" id="${classesContainerID}">Loading Classes...</div>`);
		// const url = '<?php /* base_url(); */ ?>' + 'admin_master/get_series_classes/' + valueSelected;
		// fetch(url).then(res => res.json()).then(data => {
		// 	let classesCheckBox = '';
		// 	data.forEach((item, index, arr) => {
		// 		// if (!checkedClasses.includes(item.class)) {
		// 		classesCheckBox += `<span class="col-md-3"><input class="m-1 ${valueSelected}classes" type="checkbox" id="${valueSelected+item.id}" value="${item.id}"><label for="${valueSelected+item.id}" class="m-1">${item.name}</label></span>`;
		// 		// }
		// 	});
		// 	classesCheckBox += '<div style="margin: 2rem 1.5rem 0 auto;"><span class="btn btn-sm btn-dark px-3" id="addSeries">Add</span></div>';
		// 	// subjectSeriesClasses = classesCheckBox;
		// 	$('#' + classesContainerID).html(classesCheckBox);
		// $('#' + classesContainerID).hide();
		// console.log($('#' + classesContainerID + ' span').length);
		// if ($('#' + classesContainerID + ' span').length == 1) {
		// $('#' + classesContainerID).html('<p class="text-danger text-center">You have already selected available classes with other series, please remove your current selection and reload the page if you want to select this title.</p>');
		// };
		// });

		// $(this).parent().append(`<div class="row m-0 series-classes-container pb-2 justify-content-center" id="${classesContainerID}">Loading Classes...</div>`);
		// });
		// Append Classes to Series
		$('#seriesClassesContainer').on('change', 'div #subjectSeriesSelect', function(e) {
			// $(this).next('div').remove();
			$('#' + classesContainerID).removeClass('hidden');
			// html(subjectSeriesClasses);
		});
		$('#seriesClassesContainer').on('click', 'div #addSeries', () => {
			// $('#addSeries').on('click', () => { #will not work because it is a dynamic element
			let seriesValue = $('#series').val();
			let seriesName = $('#series').find(':selected').text();
			let subjectSeriesValue = $('#subjectSeriesSelect').val();
			let subjectSeriesName = $('#subjectSeriesSelect').find(':selected').text();
			subjectSeriesSelectArr.push(subjectSeriesValue);
			// $(this).parent().parent().children('')
			// let isClassChecked = Boolean($(this).parent().parent().children().children().children("input:checkbox:checked").length);
			let isClassChecked = Boolean($(`.${seriesValue}classes:checked`).length);

			// console.log(isClassChecked);
			// console.log($(`input[name='${seriesValue}Classes[]']:checked`));
			if (!isClassChecked) return;
			let currCheckedClasses = $(`.${seriesValue}classes:checked`).map(function() {
				return $(this).val();
			}).get();
			let seriesClassesElement = `<div class="col-lg-12 p-2">
			<input type="hidden" name="series[]" value="${seriesValue}"><select class="form-control series-select" name="series[]" required="true" disabled><option value="${seriesValue}" selected>${seriesName}</option></select>
			<input type="hidden" name="${seriesValue}series[]" value="${subjectSeriesValue}"><select class="form-control series-select" name="series[]" required="true" disabled><option value="${subjectSeriesValue}" selected>${subjectSeriesName}</option></select>
			<div class="row m-0 series-classes-container pb-2">`;
			// currCheckedClasses.forEach(currClass => {
			currClasses.forEach(currClass => {
				if (currCheckedClasses.includes(currClass.id)) {
					seriesClassesElement += `<span class="col-md-2"><input type="hidden" name="${subjectSeriesValue}Classes[]" value="${currClass.id}"><input class="m-1" type="checkbox" name="${seriesValue}Classes[]" value="${currClass.id}" disabled="" checked><label class="m-1">${currClass.name}</label></span>`;
				}
			})
			seriesClassesElement += `<div style="margin: 2rem 1.5rem 0 auto;"><span class="btn btn-sm btn-danger px-3 removeSeries" data-seriesValue="${seriesValue}" data-seriesName="${seriesName}" data-clasesName="${seriesValue}Classes[]">Remove</span></div></div></div>`;
			$('#seriesClassesContainer').append(seriesClassesElement);
			// $('#series').find(':selected').remove(); // remove selected option from select
			$('#series').prop('selectedIndex', 0); // reset select input
			$(`#${seriesValue}SeriesContainer`).remove(); // remove subject series container
			$(`#${seriesValue}ClassesContainer`).remove(); // remove class container
			// remove checked checkboxes
			// $(`.${seriesValue}classes:checked`).parent().remove();
		});

		$('#seriesClassesContainer').on('click', '.removeSeries', function(e) {
			// let nameOfSeriesClasses = $(this).attr('data-clasesName');
			let seriesValue = $(this).attr('data-seriesValue');
			let seriesName = $(this).attr('data-seriesName');
			// console.log(nameOfSeriesClasses);
			// let currCheckedClasses = $(`input[name="${nameOfSeriesClasses}"]:checked`).map(function() {
			// return $(this).val();
			// }).get();
			// console.log(checkedClasses);
			// console.log(currCheckedClasses);
			// console.log(checkedClasses.filter(n => !currCheckedClasses.includes(n)));

			// make series selectable again
			$('#series').append(`<option value="${seriesValue}">${seriesName}</option>`);
			// remove classes from checkedClasses array
			// checkedClasses = checkedClasses.filter(n => !currCheckedClasses.includes(n));
			// remove the element from DOM
			$(this).parent().parent().parent().remove();
		});

		// $('#seriesClassesContainer').on('change', 'div input[type=checkbox]', function(e) {
		// 	const checkedClass = $(this).val();
		// 	if (!$(this).prop('checked')) {
		// 		// remove class from checked classes array
		// 		checkedClasses = jQuery.grep(checkedClasses, function(value) {
		// 			return value != checkedClass;
		// 		});
		// 		// Enable checkbox of same class, if one of them is unchecked
		// 		// $(`.class${$(this).val()}`).prop('disabled', false);
		// 	} else {
		// 		checkedClasses.push(checkedClass);
		// 		// Disable other checkbox of same class, if one of them is checked
		// 		// $(this).parent().parent().prev('select').prop('disabled', true);
		// 		// $(`.class${$(this).val()}`).prop('disabled', true)
		// 		// $(this).prop('disabled', false)
		// 	}
		// });
	</script>
</section>
</body>

</html>