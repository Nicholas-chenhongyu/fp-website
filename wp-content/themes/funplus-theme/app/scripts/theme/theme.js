/*

// device
let isTouchDevice = false;
// size
let resizeTicking = false;
let windowHeight = -1;
let windowWidth = -1;
// scroll
let scrollTicking = false;
let scrollTop = -1;
let scrollBottom = -1;
let fixedNav = false;

*/

let ajax_url = $("body").attr("data-ajax");

// ----------------------------------------

function isValidVariable(_variable) {
	let valid = false;
	if (typeof _variable !== "undefined") {
		if (_variable !== "null" && _variable !== null) {
			if (_variable !== "") {
				valid = true;
			}
		}
	}
	return valid;
}

function isValidInteger(_variable) {
	var valid = false;
	if (isValidVariable(_variable)) {
		if (parseInt(_variable) == _variable) {
			if (_variable > 0) {
				valid = true;
			}
		}
	}
	return valid;
}

function isValidEmail(_variable) {
	let valid = false;
	if (isValidVariable(_variable)) {
		var re =
			/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		valid = re.test(String(_variable).toLowerCase());
	}
	return valid;
}

function elementExists(_variable) {
	let valid = false;
	if (isValidVariable(_variable)) {
		if ($(_variable).length > 0) {
			valid = true;
		}
	}
	return valid;
}

function checkTouchDevice() {
	var check = false;
	(function (a) {
		if (
			/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i.test(
				a
			) ||
			/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(
				a.substr(0, 4)
			)
		)
			check = true;
	})(navigator.userAgent || navigator.vendor || window.opera);
	return check;
}

// function checkInView(id) {
//     var ele = document.getElementById(id);
//     if (!ele.length) return;

//     var options = {
//         threshold: 0,
//         rootMargin: "0px 0px -5px 0px"
//     };

//     const inView
// }

// ----------------------------------------

/*
 
function checkWindowSize () {
  // values
  windowHeight = $(window).height();
  windowWidth = $(window).width();
  // done
  resizeTicking = false;
}
function requestResizeTick () {
  if (!resizeTicking) {
    requestAnimationFrame(checkWindowSize);
  }
  resizeTicking = true;
}
 
// ----------------------------------------
 
function checkScrollPosition () {
  // values
  if (windowHeight < 0 || windowWidth < 0) return false;
  scrollTop = $(window).scrollTop();
  scrollBottom = scrollTop + windowHeight;
  // navbar
  if (scrollTop >= 100) {
    if (!fixedNav) {
      $('body').addClass('fixed-nav');
      fixedNav = true;
    }
  } else {
    if (fixedNav) {
      $('body').removeClass('fixed-nav');
      fixedNav = false;
    }
  }
  // done
  scrollTicking = false;
}
function requestScrollTick () {
  if (!scrollTicking) {
    requestAnimationFrame(checkScrollPosition);
  }
  scrollTicking = true;
}
 
*/

function initPrivacySwiper(swiper_id) {
	const container = document.querySelector(`#${swiper_id}`);

	const thisSwiper = new Swiper(container, {
		// rewind: true,
		slidesPerView: 1.1,
		spaceBetween: 8,
		slidesOffsetBefore: 0,
		parallax: true,
		speed: 500,
		navigation: {
			nextEl: ".games-slider__next",
		},
		breakpoints: {
			576: {
				slidesOffsetBefore: 20,
				spaceBetween: 8,
				slidesPerView: 1.5,
			},
			992: {
				slidesPerView: "auto",
				slidesOffsetBefore: 0,
				spaceBetween: 32,
			},
		},
	});
}

function initGameSwiper(swiper_id) {
	const container = document.querySelector(`#${swiper_id}`);

	const thisSwiper = new Swiper(container, {
		// rewind: true,
		loop: true,
		loopedAdditionalSlides: 2,
		slidesPerView: 1.1,
		spaceBetween: 8,
		slidesOffsetBefore: 0,
		parallax: true,
		speed: 500,
		navigation: {
			nextEl: ".games-slider__next",
		},
		breakpoints: {
			576: {
				slidesOffsetBefore: 20,
				spaceBetween: 8,
				slidesPerView: 1.5,
			},
			992: {
				slidesPerView: "auto",
				slidesOffsetBefore: 0,
				spaceBetween: 32,
			},
		},
	});
}

function initAltGamesSlider(swiper_id) {
	const container = document.querySelector(`#${swiper_id}`);
	const slides = container.querySelectorAll(".swiper-slide");

	if (slides.length < 2) return;
	const thisSwiper = new Swiper("#" + swiper_id, {
		loop: true,
		longSwipe: false,
		slidesPerView: 1.01,
		spaceBetween: 8,
		centeredSlides: false,
		parallax: true,
		slidesOffsetBefore: 0,
		navigation: {
			nextEl: ".games-slider-alt__next",
		},
		breakpoints: {
			992: {
				slidesPerView: "auto",
				centeredSlides: true,
				slidesOffsetBefore: 60,
				spaceBetween: 32,
			},
		},
	});
}

function initSwiper(swiper_id) {
	const slides = document.querySelectorAll(`#${swiper_id} .swiper-slide`);
	const nextEl = document.querySelector(`.slider .slider__next`);

	if (slides.length <= 1) {
		nextEl.style.display = "none";
		return;
	}

	const thisSwiper = new Swiper("#" + swiper_id, {
		loop: true,
		longSwipe: false,
		slidesPerView: 1.01,
		spaceBetween: 8,
		centeredSlides: false,
		parallax: true,
		slidesOffsetBefore: 0,
		navigation: {
			nextEl: ".slider__next",
		},
		breakpoints: {
			992: {
				slidesPerView: 1.01,
				centeredSlides: true,
				slidesOffsetBefore: 60,
				spaceBetween: 32,
			},
		},
	});
}

function initNewsSwiper(swiper_id) {
	const thisSwiper = new Swiper("#" + swiper_id, {
		loop: true,
		longSwipe: false,
		slidesPerView: 1.01,
		spaceBetween: 8,
		centeredSlides: false,
		parallax: true,
		navigation: {
			nextEl: ".news-slider__next",
		},
		breakpoints: {
			992: {
				slidesPerView: 1.01,
				centeredSlides: true,
				slidesOffsetBefore: 60,
				spaceBetween: 32,
			},
		},
	});
}

function initPressSwiper(swiper_id) {
	const thisSwiper = new Swiper("#" + swiper_id, {
		loop: true,
		longSwipe: false,
		loopedAdditionalSlides: 2,
		slidesPerView: 1.01,
		spaceBetween: 8,
		centeredSlides: false,
		parallax: true,
		navigation: {
			nextEl: ".news-slider__next",
		},
		breakpoints: {
			992: {
				slidesPerView: 2.01,
				// centeredSlides: true,
				slidesOffsetBefore: 0,
				spaceBetween: 32,
			},
		},
	});
}

function initFactsSwiper(swiper_id) {
	const container = document.querySelector(`#${swiper_id}`);

	let slides;
	const videos = [];
	const images = [];

	const thisSwiper = new Swiper("#" + swiper_id, {
		loop: true,
		slidesPerView: 1.15,
		longSwipe: false,
		spaceBetween: 8,
		centeredSlides: false,
		slidesOffsetBefore: 20,
		slidesOffsetAfter: 20,
		breakpoints: {
			992: {
				loop: true,
				slidesPerView: "auto",
				spaceBetween: 36,
				centeredSlides: true,
				slidesOffsetBefore: 0,
				slidesOffsetAfter: 0,
			},
		},
		navigation: {
			nextEl: ".facts__next",
			prevEl: ".facts__prev",
		},
		on: {
			init: () => {
				if (!window.matchMedia("(min-width: 992px)").matches) return;

				slides = container.querySelectorAll(".facts__slide");
				slides.forEach((slide) => {
					videos.push(
						slide.querySelector(".facts__slide__feature__video")
					);
					images.push(
						slide.querySelector(".facts__slide__feature__image")
					);
				});
			},
			afterInit: ({ activeIndex }) => {
				if (videos[activeIndex]) {
					videos[activeIndex].play();

					if (images[activeIndex]) {
						images[activeIndex].classList.add(
							"facts__slide__feature__image--hidden"
						);
					}
				}
			},
			slideChange: ({ activeIndex }) => {
				if (!window.matchMedia("(min-width: 992px)").matches) return;
				videos.forEach((video) => {
					if (video) {
						video.pause();
					}
				});
				images.forEach((image) => {
					if (image) {
						image.classList.remove(
							"facts__slide__feature__image--hidden"
						);
					}
				});

				if (videos[activeIndex]) {
					videos[activeIndex].play();

					if (images[activeIndex]) {
						images[activeIndex].classList.add(
							"facts__slide__feature__image--hidden"
						);
					}
				}
			},
		},
	});
}

function initLocationsSwiper() {
	const thumbs = new Swiper(".locations-slider__thumbs", {
		slidesPerView: 2.5,
		spaceBetween: 40,
		centeredSlides: true,
		initialSlide: 0,
		freeMode: true,
		watchSlidesProgress: true,
		watchSlidesVisibility: true,
		breakpoints: {
			576: {
				slidesPerView: 2,
			},
		},
	});
	const slider = new Swiper(".locations-slider__container", {
		loop: true,
		slidesPerView: 1.15,
		centeredSlides: true,
		spaceBetween: 64,
		slidesOffsetBefore: 10,
		initialSlide: 0,
		autoHeight: true,
		breakpoints: {
			576: {
				slidesPerView: 2,
			},
		},
		thumbs: {
			swiper: thumbs,
		},
	});

	slider.on("slideChange", ({ realIndex }) => {
		thumbs.slideTo(realIndex);
	});
}

function initMap(map_id) {
	const mapContainer = document.querySelector(`#${map_id}`);
	const map = mapContainer.querySelector(".world-map__map");

	// Highlight areas and show pin
	var create_pins = function () {
		const countries = JSON.parse(
			mapContainer.getAttribute("data-locations")
		).filter((country, index, array) => array.indexOf(country) === index);
		const container = $("#" + map_id).offset().top;

		countries.forEach((country) => {
			const locations = mapContainer.querySelectorAll(
				`.world-map__locations .world-map__location#${country}`
			);
			const paths = mapContainer.querySelectorAll(`path#${country}`);

			// paths.forEach(path => {
			//     path.style.fill = '#FF5A00'
			// })

			locations.forEach((location, index) => {
				const x = location.getAttribute("data-xpos");
				const y = location.getAttribute("data-ypos");

				location.setAttribute("data-index", index);

				location.style.top = `calc(${y}% + 47px)`;
				location.style.left = `calc(${x}% - 130px)`;
				$("#" + map_id + " .world-map__map__container").append(
					`<div class="pin" data-index="${index}" data-country="${country}" style="top: ${y}%; left: ${x}%" />`
				);
			});
		});
	};

	// Init
	create_pins();

	// Events
	$("#" + map_id).on("click", ".pin", function () {
		const code = $(this).attr("data-country");
		const index = $(this).attr("data-index");

		$("#" + map_id)
			.find(".pin.active")
			.removeClass("active");
		if (
			!$(`.world-map__location#${code}[data-index="${index}"]`).is(
				":visible"
			)
		) {
			$(".world-map__location:visible")
				.fadeOut(300)
				.removeClass("active");
			$(this).toggleClass("active");
			$(`.world-map__location#${code}[data-index="${index}"]`)
				.fadeToggle(300)
				.css("display", "flex")
				.addClass("active");
		} else {
			$(`.world-map__location#${code}[data-index="${index}"]`)
				.fadeOut(300)
				.removeClass("active");
		}
	});

	$("#" + map_id).click(({ target }) => {
		if (
			!window.matchMedia("(min-width:992px)").matches ||
			target.classList.contains("pin")
		)
			return;

		$("#" + map_id)
			.find(".pin.active")
			.removeClass("active");

		var code = $(this).attr("data-country");
		const index = $(this).attr("data-index");
		$(".world-map__location:visible").fadeOut(300);
		$(this).toggleClass("active");
		$(`.world-map__location#${code}[data-index="${index}"]`)
			.fadeToggle(300)
			.css("display", "flex");
	});

	$(document).keydown(({ keyCode }) => {
		if (keyCode !== 27) return;

		$("#" + map_id)
			.find(".pin.active")
			.removeClass("active");

		var code = $(this).attr("data-country");
		const index = $(this).attr("data-index");
		$(".world-map__location:visible").fadeOut(300);
		$(this).toggleClass("active");
		$(`.world-map__location#${code}[data-index="${index}"]`)
			.fadeToggle(300)
			.css("display", "flex");
	});
}

function initLoadMore(section_id) {
	const thisBtn = $("#" + section_id).find("button.load-more");
	const thisTarget = $("#" + section_id).find(".load-more-target");

	var max = $("#" + section_id).attr("data-max"),
		args = JSON.parse(thisBtn.attr("data-args")),
		can_load = true;

	thisBtn.on("click", function () {
		if (can_load && args.paged <= max) {
			$.ajax({
				type: "post",
				url: ajax_url,
				data: {
					args: args,
					action: "ajax_load_more",
				},
				beforeSend: function () {
					can_load = false;
					args.paged++;
					console.log(args);
					if (args.paged > max) {
						thisBtn.fadeOut(300, function () {
							$(this).remove();
						});
					}
				},
				success: function (response) {
					can_load = true;
					if (response.length) {
						thisTarget.append(response);
					}
				},
			});
		}
	});
}

function switchNews(section_id) {
	const thisBtn = $("#" + section_id).find("button.load-more");
	const thisTarget = $("#" + section_id).find(".load-more-target");
	const switchBtns = document.querySelectorAll("li.term");

	switchBtns.forEach((switchBtn) => {
		switchBtn.addEventListener("click", function () {
			const cat = switchBtn.getAttribute("data-term");
			const name = switchBtn.innerText;
			const args = {
				post_type: "post",
				posts_per_page: "3",
				cat: cat,
			};
			$.ajax({
				type: "post",
				url: ajax_url,
				data: {
					args: args,
					action: "ajax_load_more",
				},
				success: function (response) {
					if (response.length) {
						thisTarget.html(response);
						$("#countriesLink").text(name);
						const newQuery = {
							post_type: "post",
							posts_per_page: "3",
							tax_query: [
								{
									taxonomy: "category",
									field: "id",
									terms: cat,
								},
							],
							paged: 2,
						};
						thisBtn.attr("data-args", JSON.stringify(newQuery));
					}
				},
			});
		});
	});
}

function initCards(swiper_id) {
	var container = $("#" + swiper_id)
			.parents(".cards")
			.find(".container-sm"),
		offset = container.offset().left;

	if ($("#" + swiper_id).hasClass("activiate-slider")) {
		const thisSwiper = new Swiper("#" + swiper_id, {
			loop: false,
			slidesPerView: 1.05,
			longswipe: false,
			spaceBetween: 8,
			centeredSlides: false,
			slidesOffsetBefore: 20,
			breakpoints: {
				783: {
					loop: false,
					slidesPerView: 3.2,
					longSwipe: false,
					spaceBetween: 32,
					centeredSlides: false,
					slidesOffsetBefore: offset / 2,
				},
			},
		});
	} else {
		if ($(window).width() < 783) {
			const thisSwiper = new Swiper("#" + swiper_id, {
				loop: false,
				slidesPerView: 1.05,
				longswipe: false,
				spaceBetween: 8,
				centeredSlides: false,
				slidesOffsetBefore: 0,
			});
		}
	}
}

function initTimeline(swiper_id, years) {
	const container = document.querySelector(`#${swiper_id}`);

	const innerContainers = container.querySelectorAll(".card-container");

	if (window.matchMedia("(max-width:1124px)").matches) {
		console.log("tablet");
		const slides = container.querySelectorAll(
			".timeline__slide.swiper-slide"
		);

		slides[slides.length - 1].classList.add("d-none");
	}

	const thisSwiper = new Swiper(container, {
		loop: false,
		slidesPerView: 1,
		speed: 1200,
		threshold: 5,
		direction: "horizontal",
		parallax: true,
		scrollbar: {
			el: ".timeline-scrollbar",
			draggable: true,
			dragSize: 22,
		},
		pagination: {
			el: ".timeline-pagination",
			clickable: true,
			dynamicBullets: true,
			dynamicMainBullets: 1,
			renderBullet: function (index, className) {
				if (years[index]) {
					return (
						'<li class="' +
						className +
						'"><span class="year">' +
						years[index] +
						"</span></li>"
					);
				}
			},
		},
		breakpoints: {
			1124: {
				slidesPerView: 2,
				spaceBetween: 100,
				direction: "vertical",
				pagination: {
					dynamicBullets: false,
					dynamicMainBullets: 1,
				},
			},
		},
		on: {
			breakpoint: function (swiper) {
				if (swiper.params.pagination.dynamicBullets) {
					swiper.pagination.init();
				}
			},
		},
	});

	innerContainers.forEach((innerContainer) => {
		const container = innerContainer.querySelector(".swiper-container");
		const innerSlides = innerContainer.querySelectorAll(
			`.timeline__card-inner.swiper-slide`
		);
		const nextEl = innerContainer.querySelector(".btn--next");
		const prevEl = innerContainer.querySelector(".btn--prev");

		if (innerSlides.length <= 1) return;
		const innerSwiper = new Swiper(container, {
			loop: true,
			slidesPerView: 1,
			navigation: {
				nextEl,
				prevEl,
			},
			allowTouchMove: false,
			breakpoints: {
				1124: {
					allowTouchMove: true,
				},
			},
		});
	});
}

function initBtnChevron(btnID) {
	if (!window.matchMedia("(min-width:568px)").matches) return;

	const button = document.querySelector(`#${btnID}`);

	if (!button) return;

	if (isInViewport(button)) {
		removeDelay(button);
		return;
	}

	const removeButtonDelay = () => {
		if (!isInViewport(button)) return;

		removeDelay(button);
		window.removeEventListener("scroll", removeButtonDelay);
	};

	window.addEventListener("scroll", removeButtonDelay);
}

function initWebm(id) {
	const isSafari = detectSafari();
	const container = document.querySelector(`#${id}`);

	if (!container) return;

	const video = container.querySelector(".banner__main__feature__video");
	const placeholder = container.querySelector(
		".banner__main__feature__placeholder"
	);

	if (isSafari) return;

	if (video) {
		video.classList.remove("d-none");
	}

	if (placeholder) {
		placeholder.classList.add("d-none");
	}
}

function removeDelay(el) {
	if (!el) return;
	setTimeout(() => {
		el.style.transitionDelay = "0s";
	}, 3000);
}

function isInViewport(elem) {
	const bounding = elem.getBoundingClientRect();
	return (
		bounding.top >= 0 &&
		bounding.left >= 0 &&
		bounding.bottom <=
			(window.innerHeight || document.documentElement.clientHeight) &&
		bounding.right <=
			(window.innerWidth || document.documentElement.clientWidth)
	);
}

function detectSafari() {
	const { navigator } = window;
	const ua = navigator.userAgent.toLowerCase();
	const isSafari =
		ua.indexOf("safari") != -1 &&
		!(ua.indexOf("chrome") != -1) &&
		ua.indexOf("version/") != -1;
	return isSafari;
}

// ----------------------------------------

$(document).ready(() => {
	setTimeout(function () {
		$(".has_loader .loader").fadeOut(300);
	}, 1400);

	/*
  
    // check
    isTouchDevice = checkTouchDevice();
  
    // resize
    checkWindowSize();
    $(window).on('resize', requestResizeTick);
  
    // scroll
    checkScrollPosition();
    $(window).on('scroll', requestScrollTick);
  
    */

	// Nav toggle
	$(document).on("click", ".nav-bar .nav-bar__toggle", function () {
		$(this).toggleClass("toggled");
		$(".mobile-nav").toggleClass("shown wow animated");
		$(".mobile-nav").find("li").addClass("animated");
		$(window).scrollTop(0);
		$("body").toggleClass("locked");
	});

	// Management Team click
	$(".management button").on("click", function () {
		$(".col-12").removeClass("hidden");
		$(this).hide();
	});

	// How long you want the animation to take, in ms
	const animationDuration = 2000;
	// Calculate how long each ‘frame’ should last if we want to update the animation 60 times per second
	const frameDuration = 1000 / 60;
	// Use that to calculate how many frames we need to complete the animation
	const totalFrames = Math.round(animationDuration / frameDuration);
	// An ease-out function that slows the count as it progresses
	const easeOutQuad = (t) => t * (2 - t);

	// The animation function, which takes an Element
	function animateCountUp(el) {
		let frame = 0;
		const countTo = parseInt(el.innerHTML, 10);
		// Start the animation running 60 times per second
		const counter = setInterval(() => {
			frame++;
			// Calculate our progress as a value between 0 and 1
			// Pass that value to our easing function to get our
			// progress on a curve
			const progress = easeOutQuad(frame / totalFrames);
			// Use the progress value to calculate the current count
			const currentCount = Math.round(countTo * progress);

			// If the current count has changed, update the element
			if (parseInt(el.innerHTML, 10) !== currentCount) {
				el.innerHTML = currentCount;
			}

			// If we’ve reached our last frame, stop the animation
			if (frame === totalFrames) {
				clearInterval(counter);
			}
		}, frameDuration);
	}

	function afterReveal(el) {
		if (!el.classList.contains("banner-statistics")) {
			return;
		} else {
			const countupEls = el.querySelectorAll(".countup");
			const statistics = document.querySelector(".banner-statistics");

			statistics.style.opacity = 0;

			// countupEls.forEach((element) => {
			//     element.style.opacity = 0
			// })

			setTimeout(() => {
				countupEls.forEach((element) => {
					statistics.style.opacity = 1;
					animateCountUp(element);
				});
			}, 2000);
		}
	}

	const queryString = window.location.search;
	const urlParams = new URLSearchParams(queryString);
	const jobTitle = urlParams.get("job");

	const jobTitleInput = document.querySelector("#job_title");

	if (jobTitleInput) {
		jobTitleInput.value = jobTitle;
	}

	const pressCategory = urlParams.get("category");
	const pressList = document.querySelector(".post-loop");

	if (pressCategory) {
		pressList.scrollIntoView();
	}

	// WOW Animations
	let wow = new WOW({
		boxClass: "wow",
		animateClass: "animated",
		offset: 0,
		mobile: true,
		live: true,
		callback: afterReveal,
	});
	wow.init();

	// Fixed navbar

	$(window).scroll(function () {
		var scroll = $(window).scrollTop();

		if (scroll >= 300) {
			$(".nav-bar").addClass("scrolled");
		} else {
			$(".nav-bar").removeClass("scrolled");
		}
	});
});

function trackReaderClicks() {
	const btn = document.querySelector("#soc-comic");
	btn.on("click", function () {
		$.ajax({
			type: "post",
			url: ajax_url,
			data: {
				action: "updateReads",
			},
		});
	});
}
