"use strict";

/*--
        Header Sticky
    -----------------------------------*/

window.onscroll = function () {
  const left = document.getElementById("header");

  if (left.scrollTop > 50 || self.pageYOffset > 50) {
    left.classList.add("sticky");
  } else {
    left.classList.remove("sticky");
  }
};

/*--
        Menu parent Element Icon
    -----------------------------------*/
const $subMenu = document.querySelectorAll(".sub-menu");
$subMenu.forEach(function (subMenu) {
  const menuExpand = document.createElement("span");
  menuExpand.classList.add("menu-icon");
  // menuExpand.innerHTML = '+'
  subMenu.parentElement.insertBefore(menuExpand, subMenu);
  if (subMenu.classList.contains("mega-menu")) {
    subMenu.classList.remove("mega-menu");
    subMenu.querySelectorAll("ul").forEach(function (ul) {
      ul.classList.add("sub-menu");
      const menuExpand = document.createElement("span");
      menuExpand.classList.add("menu-icon");
      menuExpand.innerHTML = "+";
      ul.parentElement.insertBefore(menuExpand, ul);
    });
  }
});

/*--
        Mobile Menu
    -----------------------------------*/

/* Get Sibling */
const getSiblings = function (elem) {
  const siblings = [];
  let sibling = elem.parentNode.firstChild;
  while (sibling) {
    if (sibling.nodeType === 1 && sibling !== elem) {
      siblings.push(sibling);
    }
    sibling = sibling.nextSibling;
  }
  return siblings;
};

/* Slide Up */
const slideUp = (target, time) => {
  const duration = time ? time : 500;
  target.style.transitionProperty = "height, margin, padding";
  target.style.transitionDuration = duration + "ms";
  target.style.boxSizing = "border-box";
  target.style.height = target.offsetHeight + "px";
  target.offsetHeight;
  target.style.overflow = "hidden";
  target.style.height = 0;
  window.setTimeout(() => {
    target.style.display = "none";
    target.style.removeProperty("height");
    target.style.removeProperty("overflow");
    target.style.removeProperty("transition-duration");
    target.style.removeProperty("transition-property");
  }, duration);
};

/* Slide Down */
const slideDown = (target, time) => {
  const duration = time ? time : 500;
  target.style.removeProperty("display");
  let display = window.getComputedStyle(target).display;
  if (display === "none") display = "block";
  target.style.display = display;
  const height = target.offsetHeight;
  target.style.overflow = "hidden";
  target.style.height = 0;
  target.offsetHeight;
  target.style.boxSizing = "border-box";
  target.style.transitionProperty = "height, margin, padding";
  target.style.transitionDuration = duration + "ms";
  target.style.height = height + "px";
  window.setTimeout(() => {
    target.style.removeProperty("height");
    target.style.removeProperty("overflow");
    target.style.removeProperty("transition-duration");
    target.style.removeProperty("transition-property");
  }, duration);
};

/* Slide Toggle */
const slideToggle = (target, time) => {
  const duration = time ? time : 500;
  if (window.getComputedStyle(target).display === "none") {
    return slideDown(target, duration);
  } else {
    return slideUp(target, duration);
  }
};

/*--
		Offcanvas/Collapseable Menu
	-----------------------------------*/
const offCanvasMenu = function (selector) {
  const $offCanvasNav = document.querySelector(selector),
    $subMenu = $offCanvasNav.querySelectorAll(".sub-menu");
  $subMenu.forEach(function (subMenu) {
    const menuExpand = document.createElement("span");
    menuExpand.classList.add("menu-expand");
    // menuExpand.innerHTML = '+'
    subMenu.parentElement.insertBefore(menuExpand, subMenu);
    if (subMenu.classList.contains("mega-menu")) {
      subMenu.classList.remove("mega-menu");
      subMenu.querySelectorAll("ul").forEach(function (ul) {
        ul.classList.add("sub-menu");
        const menuExpand = document.createElement("span");
        menuExpand.classList.add("menu-expand");
        menuExpand.innerHTML = "+";
        ul.parentElement.insertBefore(menuExpand, ul);
      });
    }
  });

  $offCanvasNav.querySelectorAll(".menu-expand").forEach(function (item) {
    item.addEventListener("click", function (e) {
      e.preventDefault();
      const parent = this.parentElement;
      if (parent.classList.contains("active")) {
        parent.classList.remove("active");
        parent.querySelectorAll(".sub-menu").forEach(function (subMenu) {
          subMenu.parentElement.classList.remove("active");
          slideUp(subMenu);
        });
      } else {
        parent.classList.add("active");
        slideDown(this.nextElementSibling);
        getSiblings(parent).forEach(function (item) {
          item.classList.remove("active");
          item.querySelectorAll(".sub-menu").forEach(function (subMenu) {
            subMenu.parentElement.classList.remove("active");
            slideUp(subMenu);
          });
        });
      }
    });
  });
};
offCanvasMenu(".offcanvas-menu");

/*--
        AOS
    -----------------------------------*/
AOS.init();

// niced select

$(document).ready(function () {
  $(".nice_select").niceSelect();
});

var swiper = new Swiper(".cate_slider", {
  loop: true,
  autoplay: {
    delay: 3000,
  },
  navigation: {
    nextEl: ".next_cate",
    prevEl: ".prev_cate",
  },
  breakpoints: {
    320: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    480: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    640: {
      slidesPerView: 3,
      spaceBetween: 30,
    },
    991: {
      slidesPerView: 5,
      spaceBetween: 10,
    },
  },
});

var swiper = new Swiper(".trend_slider", {
  loop: true,
  autoplay: {
    delay: 3000,
  },
  navigation: {
    nextEl: ".next_trend",
    prevEl: ".prev_trend",
  },
  breakpoints: {
    320: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    480: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    991: {
      slidesPerView: 3,
      spaceBetween: 10,
    },
  },
});

var swiper = new Swiper(".blog_slider", {
  loop: true,
  autoplay: {
    delay: 3000,
  },
  navigation: {
    nextEl: ".next_blog",
    prevEl: ".prev_blog",
  },
  breakpoints: {
    640: {
      slidesPerView: 1,
      spaceBetween: 30,
    },
    768: {
      slidesPerView: 2,
      spaceBetween: 30,
    },
    991: {
      slidesPerView: 3,
      spaceBetween: 30,
    },
  },
});

var swiper = new Swiper(".mySwiper", {
  spaceBetween: 10,
  slidesPerView: 5,
  freeMode: true,
  watchSlidesProgress: true,
});
var swiper2 = new Swiper(".mySwiper2", {
  spaceBetween: 10,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  thumbs: {
    swiper: swiper,
  },
});

document.addEventListener("DOMContentLoaded", function () {
  const counters = document.querySelectorAll(".counter");
  const duration = 2000;

  const animateCounters = (entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        counters.forEach((counter) => {
          const target = +counter.getAttribute("data-target");
          const start = 0;
          const range = target - start;
          const startTime = performance.now();

          const updateCount = () => {
            const currentTime = performance.now();
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);
            counter.innerText = Math.floor(progress * range).toLocaleString();

            if (progress < 1) {
              requestAnimationFrame(updateCount);
            } else {
              counter.innerText = target.toLocaleString();
            }
          };

          updateCount();
        });

        // Unobserve after animation is done
        observer.unobserve(entry.target);
      }
    });
  };

  const observer = new IntersectionObserver(animateCounters, {
    threshold: 0.1,
  });

  counters.forEach((counter) => {
    observer.observe(counter);
  });
});

var swiper = new Swiper(".mySwiper_hero", {
  autoplay: { delay: 6000 },
  loop: true,
  navigation: {
    nextEl: ".hero_swiper-button-next",
    prevEl: ".hero_swiper-button-prev",
  },
});

// for filter modal

$(document).ready(function () {
  $("#more_option").click(function () {
    $(".more_filter_card").fadeIn(300);
    $(".backdrop").fadeIn(300);
  });

  $("#backdrop").click(function () {
    $(".more_filter_card").fadeOut(300);
    $(".backdrop").fadeOut(300);
  });
});

$(document).ready(function () {
  $("#budget_box").click(function () {
    $(".slider_box").slideToggle();
  });

  $(document).click(function (event) {
    if (!$(event.target).closest(".slider_box, #budget_box").length) {
      $(".slider_box").slideUp();
    }
  });
});

/* ==============================================================================
                              Loan Calculator
============================================================================== */

document.addEventListener("DOMContentLoaded", function () {
  const loanAmountSlider = document.getElementById("loan-amount");
  const loanTenureSlider = document.getElementById("loan-term");
  const interestRateSlider = document.getElementById("interest-rate");

  const loanAmountValue = document.getElementById("loan-amount-value");
  const loanTenureValue = document.getElementById("loan-term-value");
  const interestRateValue = document.getElementById("interest-rate-value");

  const emiAmount = document.getElementById("emi");
  const totalInterest = document.getElementById("total-interest");
  const totalPayment = document.getElementById("total-amount");

  const tenureYearsRadio = document.getElementById("tenure-years");
  const tenureMonthsRadio = document.getElementById("tenure-months");

  let isYears = true;

  function calculateEMI() {
    const principal = parseFloat(loanAmountSlider.value);
    const tenure = isYears
      ? parseFloat(loanTenureSlider.value) * 12
      : parseFloat(loanTenureSlider.value);
    const rate = parseFloat(interestRateSlider.value) / 12 / 100;

    const emi =
      (principal * rate * Math.pow(1 + rate, tenure)) /
      (Math.pow(1 + rate, tenure) - 1);
    const totalPaymentAmount = emi * tenure;
    const totalInterestAmount = totalPaymentAmount - principal;

    emiAmount.textContent = emi.toFixed(2);
    totalInterest.textContent = totalInterestAmount.toFixed(2);
    totalPayment.textContent = totalPaymentAmount.toFixed(2);
  }

  function updateValues() {
    loanAmountSlider.value = loanAmountValue.value;
    loanTenureSlider.value = loanTenureValue.value;
    interestRateValue.value = interestRateSlider.value;

    calculateEMI();
    console.log("updateValues", loanAmountValue.value);
  }

  tenureYearsRadio.addEventListener("change", function () {
    isYears = true;
    loanTenureSlider.max = 30;
    if (parseFloat(loanTenureSlider.value) > 30) {
      loanTenureSlider.value = 10;
    }
    updateValues();
  });

  tenureMonthsRadio.addEventListener("change", function () {
    isYears = false;
    loanTenureSlider.max = 360;
    loanTenureSlider.value = parseFloat(loanTenureSlider.value) * 12;
    updateValues();
  });

  loanAmountSlider.addEventListener("input", function () {
    loanAmountValue.value = loanAmountSlider.value;
    updateValues();
  });

  loanTenureSlider.addEventListener("input", function () {
    loanTenureValue.value = loanTenureSlider.value;
    updateValues();
  });

  interestRateSlider.addEventListener("input", function () {
    interestRateValue.value = interestRateSlider.value;
    updateValues();
  });

  loanAmountValue.addEventListener("input", function () {
    loanAmountSlider.value = loanAmountValue.value;
    updateValues();
  });

  loanTenureValue.addEventListener("input", function () {
    loanTenureSlider.value = loanTenureValue.value;
    updateValues();
  });
  interestRateValue.addEventListener("input", function () {
    interestRateSlider.value = interestRateValue.value;
    updateValues();
  });

  updateValues();
});

document.addEventListener("scroll", function () {
  const listItems = document.querySelectorAll("#nav_tab .gal_li");
  const getUrl = window.location.href;
  const link = getUrl.split("#");
  let finalUrl = `#${link[1]}`;
  listItems.forEach((item) => {
    item.addEventListener("click", function () {
      listItems.forEach((li) => li.classList.remove("active"));
      this.classList.add("active");
    });
  });
});

window.addEventListener("scroll", function () {
  const contactForm = document.querySelector("#side_bar");
  // const footer = document.querySelector(".footer");
  // const footerRect = footer.getBoundingClientRect();
  const relatedProp = document.querySelector("#related_prop");
  const relatedPropRect = relatedProp.getBoundingClientRect();
  const contactFormHeight = contactForm.offsetHeight;
  const viewportHeight = window.innerHeight;
  const scroll = window.scrollY;
  const tabNav = document.querySelector("#nav_tab_desc");
  const tab_bot = this.document.querySelector("#nav_tab");
  const detailsBody = document
    .querySelector("#details_inner")
    .getBoundingClientRect()
    .bottom.toFixed(0);
  const propInnerWidth =
    document.querySelector("#property_details").offsetWidth;
  let getScrollvalue = tabNav.getBoundingClientRect();

  if (getScrollvalue.bottom < 0) {
    tab_bot.classList.add("sticky_bot");
    tab_bot.style.maxWidth = `${propInnerWidth}px`;
  } else {
    tab_bot.classList.remove("sticky_bot");
  }

  if (relatedPropRect.top < viewportHeight) {
    contactForm.style.top = `${
      relatedPropRect.top - contactFormHeight - 200
    }px`;
  } else if (scroll < 20) {
    contactForm.style.top = "80px";
  } else {
    contactForm.classList.remove("sticky-footer");
    contactForm.style.top = "0px";
  }

  if (detailsBody < 0) {
    tab_bot.classList.remove("sticky_bot");
  }
});

document.addEventListener("DOMContentLoaded", () => {
  const sections = document.querySelectorAll(
    'div[id^="overview"], div[id^="plocation"], div[id^="amenities"], div[id^="specification"], div[id^="floor_Plans"], div[id^="price_sec"], div[id^="gallery_sec"]'
  );
  const navItems = document.querySelectorAll("#nav_tab .gal_li");

  function activateLink() {
    let index = sections.length + 1;
    console.log(index);
    console.log(--index);
    while (--index && window.scrollY - 450 < sections[index].offsetTop) {}

    navItems.forEach((item) => item.classList.remove("active"));
    navItems[index] && navItems[index].classList.add("active");
  }

  activateLink();
  window.addEventListener("scroll", activateLink);
});

document.addEventListener("DOMContentLoaded", function () {
  const windowWidth = document.body.offsetWidth;
  const contactInner = document.querySelector("#contact_col").offsetWidth;
  const contactForm = document.querySelector("#side_bar");
  const contactBun = document.querySelector("#ctf_open");
  if (windowWidth >= 1024) {
    contactForm.style.maxWidth = `${contactInner - 20}px`;
  } else {
    contactForm.style.maxWidth = "250px";
    contactForm.style.right = "-100%";
  }
  contactBun.addEventListener("click", function () {
    contactForm.style.right = "0px";
    contactForm.style.top = "0px";
  });
});

$(document).ready(function () {
  const windowWidth = $("body").outerWidth();
  const contactInner = $("#contact_col").outerWidth();
  const contactForm = $("#side_bar");
  const contactBun = $("#ctf_open");
  const backdrop = $("#backdrop");

  if (windowWidth >= 1024) {
    contactForm.css("max-width", `${contactInner - 20}px`);
  } else {
    contactForm.css({
      "max-width": "70%",
      right: "-100%",
    });
    const myTimeout = setTimeout(openOffer, 5000);
    function openOffer() {
      contactForm.css({
        right: "0px",
        top: "80px",
      });
      backdrop.fadeIn(300);
    }
  }

  contactBun.on("click", function () {
    contactForm.css({
      right: "0px",
      top: "80px",
    });
    backdrop.fadeIn(300);
  });
  backdrop.on("click", function () {
    contactForm.css({
      right: "-100%",
    });
    backdrop.fadeOut(300);
  });
});
