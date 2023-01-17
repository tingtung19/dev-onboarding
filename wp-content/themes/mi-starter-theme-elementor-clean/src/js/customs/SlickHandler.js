import "slick-carousel";
import $ from "jquery";

const createSlick = () => {
	console.log("slick handler");

	//setiap action kasih kondisi pengecekan apakah selector itu ada;
	const selector = $("#selector");

	//pengecekan bisa pake lengthnya kalo pake jquery kalo pake vanilla bisa langsung selectornya if(selector)
	if (selector.length > 0) {
		selector.slick({
			arrows: true,
			infinite: true,
			centerPadding: "20px",
			speed: 300,
			slidesToShow: 4,
			prevArrow: $(".sliderPosts-arrow-left"),
			nextArrow: $(".sliderPosts-arrow-right"),
			responsive: [
				{
					breakpoint: 1025,
					settings: {
						centerMode: true,
						slidesToShow: 2,
					},
				},
				{
					breakpoint: 768,
					settings: {
						arrows: false,
						centerMode: true,
						centerPadding: "0px",
						slidesToShow: 1,
					},
				},
			],
		});
	}
};

export default { createSlick };
