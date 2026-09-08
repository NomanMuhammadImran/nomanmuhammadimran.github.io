// ── Project Filter
const filterBtns = document.querySelectorAll('.filter-btn');
const projectItems = document.querySelectorAll('.project-item');

filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {

        // active button
        filterBtns.forEach(b => b.classList.remove('active'));
        btn.classList.add('active');

        const filter = btn.getAttribute('data-filter');

        projectItems.forEach(item => {

            if (filter === 'all') {
                item.style.display = 'block';
            } else {
                if (item.classList.contains(filter)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            }

        });

    });
});

$(".project-filters button").on('click', function () {
    let index = $(this).index() + 1;
    $('.col-lg-7 .project-item').hide()
    $('.col-lg-7 .project-item:nth-child(' + index + ')').show();
    $(".project-filters button").removeClass("active");
    $(this).addClass("active");

})

// ── Navbar scroll effect
const nav = document.getElementById('mainNav');
window.addEventListener('scroll', () => {
    nav.classList.toggle('scrolled', window.scrollY > 30);
});

// ── Active nav link highlight
const sections = document.querySelectorAll('section[id]');
const navLinks = document.querySelectorAll('.nav-link');
window.addEventListener('scroll', () => {
    let current = '';
    sections.forEach(s => {
        if (window.scrollY >= s.offsetTop - 120) current = s.id;
    });
    navLinks.forEach(l => {
        l.classList.toggle('active', l.getAttribute('href') === '#' + current);
    });
});

// ── Skill bar animation on scroll
const bars = document.querySelectorAll('.progress-bar');
const barObserver = new IntersectionObserver((entries) => {
    entries.forEach(e => {
        if (e.isIntersecting) {
            e.target.style.width = e.target.dataset.width + '%';
            barObserver.unobserve(e.target);
        }
    });
}, { threshold: 0.3 });
bars.forEach(b => barObserver.observe(b));

// ── Reveal on scroll
const reveals = document.querySelectorAll('.reveal');
const revObserver = new IntersectionObserver((entries) => {
    entries.forEach(e => {
        if (e.isIntersecting) {
            e.target.classList.add('visible');
            revObserver.unobserve(e.target);
        }
    });
}, { threshold: 0.1 });
reveals.forEach(r => revObserver.observe(r));

// ── Contact form feedback
document.querySelector('.btn-submit').addEventListener('click', function () {
    const n = document.querySelectorAll('.form-control-custom')[0].value;
    if (n.trim()) {
        this.innerHTML = '<i class="ti ti-check"></i> Message Sent!';
        this.style.background = '#00c89a';
        setTimeout(() => {
            this.innerHTML = 'Send Message <i class="ti ti-send"></i>';
            this.style.background = '';
        }, 3000);
    }
});

// year dynamic js
document.addEventListener("DOMContentLoaded", function () {
    const yearElement = document.getElementById("year");
    if (yearElement) {
        yearElement.textContent = new Date().getFullYear();
    } else {
        console.log("Element #year not found");
    }
});

const heroStats = document.querySelector('.hero-stats');
const numbers = document.querySelectorAll('.num');

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {

            heroStats.classList.add('active');

            numbers.forEach(num => {
                const target = +num.getAttribute('data-count');
                const originalText = num.textContent;

                let suffix = '';

                if (originalText.includes('+')) suffix = '+';
                if (originalText.includes('%')) suffix = '%';

                let count = 0;
                const speed = target / 60;

                const updateCount = () => {
                    count += speed;

                    if (count < target) {
                        num.textContent = Math.ceil(count) + suffix;
                        requestAnimationFrame(updateCount);
                    } else {
                        num.textContent = target + suffix;
                    }
                };

                updateCount();
            });

            observer.unobserve(heroStats);
        }
    });
}, {
    threshold: 0.4
});

observer.observe(heroStats);

// Hiring Form Validation Js
$("#HiringForm").on("submit", function (e) {
    // e.preventDefault();
    $("form .primary-btn").attr("disabled", true);
    const fullname = $(this).find("[name='fullname']");
    const email = $(this).find("[name='email']");
    const companyname = $(this).find("[name='companyname']");
    const jobposition = $(this).find("[name='jobposition']");
    const employmenttype = $(this).find("[name='employmenttype']");
    const worklocation = $(this).find("[name='worklocation']");
    const grecaptchaResponse1 = grecaptcha.getResponse(0);
    // const recapcha1 = $(".input.recapcha1");
    let submit = true;

    if (fullname.val() == "") {
        fullname.parent().addClass("error");
        fullname.parent().find(".error-txt").html("This field is requried");
        submit = false;
    }

    if (email.val() == "") {
        email.parent().addClass("error");
        email.parent().find(".error-txt").html("This field is requried");
        submit = false;
    } else if (!checkEmailField(email.val())) {
        email.parent().addClass("error");
        email.parent().find(".error-txt").html("Invalid email");
        submit = false;
    }

    if (companyname.val() == "") {
        companyname.parent().addClass("error");
        companyname.parent().find(".error-txt").html("This field is requried");
        submit = false;
    }

    if (jobposition.val() == "") {
        jobposition.parent().addClass("error");
        jobposition.parent().find(".error-txt").html("This field is requried");
        submit = false;
    }

    if (employmenttype.val() == "") {
        employmenttype.parent().addClass("error")
        employmenttype.parent().find(".error-txt").html("This field is requried")
        submit = false
    }

    if (worklocation.val() == "") {
        worklocation.parent().addClass("error");
        worklocation.parent().find(".error-txt").html("This field is requried");
        submit = false;
    }

    const recapcha1 = $(".input.recapcha1");

    if (!grecaptchaResponse1) {
        recapcha1.addClass("error");
        recapcha1.find(".error-txt").html("Please verify that you are human");
        submit = false;
    } else {
        captchaVerified1();
    }

    if (!submit) {
        e.preventDefault();
        $("form .primary-btn").attr("disabled", true);
    }
});

function captchaVerified1() {
    const recapcha1 = $(".input.recapcha1");
    recapcha1.removeClass("error");
    recapcha1.find(".error-txt").html("");
}


$("#HiringForm input").on("input", function () {
    $(this).parents(".input").removeClass("error");
    $(this).parents(".input").find(".error-txt").html("");
});

$("#HiringForm select").on("change", function () {
    $(this).parent().removeClass("error")
    $(this).parent().find(".error-txt").html("")
});

// email validation
document.querySelectorAll(".validate-email").forEach(element => {
    let filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    element.addEventListener("blur", function () {
        if (!filter.test(element.value)) {
            element.parentElement.classList.add("error")
            element.parentElement.querySelector(".error-txt").innerHTML = "Invalid Email";
        } else {
            element.parentElement.classList.remove("error")
            element.parentElement.querySelector(".error-txt").innerHTML = "";
        }
        if (element.value === "") {
            element.parentElement.classList.remove("error")
            element.parentElement.querySelector(".error-txt").innerHTML = "";
        }
    });
});

function checkEmailField(val) {
    let isValid = true;
    if (
        !/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(val)
    ) {
        isValid = false;
    }
    return isValid;
}

// File Upload Js Start
document.querySelectorAll(".file-upload").forEach((fileUpload) => {
    const fileInput = fileUpload.querySelector('input[type="file"]');
    const fileBtn = fileUpload.querySelector(".file-btn");
    const fileNameIcon = fileUpload.querySelector(".file-name-icon");
    const fileName = fileUpload.querySelector(".file-name");
    const fileMb = fileUpload.querySelector(".file-mb");
    const closeIcon = fileUpload.querySelector(".close-icon");


    // Max file size: 50MB
    const MAX_FILE_SIZE = 50 * 1024 * 1024;

    // Helper: Format file size
    function formatFileSize(bytes) {
        if (bytes < 1024) return bytes + ' B';
        if (bytes < 1048576) return (bytes / 1024).toFixed(1) + ' KB';
        if (bytes < 1073741824) return (bytes / 1048576).toFixed(2) + ' MB';
        return (bytes / 1073741824).toFixed(2) + ' GB';
    }

    // Helper: Show error
    function showError(message) {
        fileUpload.classList.add('error');
        let errorEl = fileUpload.querySelector('.file-error');
        if (!errorEl) {
            errorEl = document.createElement('span');
            errorEl.className = 'file-error';
            fileUpload.appendChild(errorEl);
        }
        errorEl.textContent = '⚠️ ' + message;
        errorEl.style.display = 'block';
        setTimeout(() => {
            errorEl.style.display = 'none';
            fileUpload.classList.remove('error');
        }, 5000);
    }

    // Clear error
    function clearError() {
        fileUpload.classList.remove('error');
        const errorEl = fileUpload.querySelector('.file-error');
        if (errorEl) {
            errorEl.style.display = 'none';
        }
    }

    // Hide elements initially
    fileNameIcon.style.display = 'none';
    fileBtn.style.display = 'inline-flex';

    // File input change
    fileInput.addEventListener("change", function () {
        clearError();

        if (this.files.length > 0) {
            const file = this.files[0];

            // Check size (50MB limit)
            if (file.size > MAX_FILE_SIZE) {
                showError('File size exceeds 50MB limit. Please choose a smaller file.');
                this.value = "";
                return;
            }

            // Display file
            fileName.textContent = file.name;
            if (fileMb) {
                fileMb.textContent = formatFileSize(file.size);
                fileMb.style.display = 'inline';
            }

            fileBtn.style.display = 'none';
            fileNameIcon.style.display = 'flex';
        }
    });

    // Close icon click
    closeIcon.addEventListener("click", function (event) {
        event.preventDefault();
        event.stopPropagation();
        fileInput.value = "";
        fileName.textContent = "";
        if (fileMb) {
            fileMb.textContent = "";
            fileMb.style.display = 'none';
        }
        fileNameIcon.style.display = 'none';
        fileBtn.style.display = 'inline-flex';
        clearError();
    });

    // Optional: Click on label triggers file input
    fileUpload.addEventListener('click', function (e) {
        // Don't trigger if clicking on close icon
        if (e.target.closest('.close-icon')) return;
        // Don't trigger if clicking on file input itself
        if (e.target.tagName === 'INPUT') return;
        fileInput.click();
    });
});
// File Upload Js End


// intlTelInput JS
let iti
var input = document.querySelector("#phone");
if (input) {
    iti = window.intlTelInput(input, {
        initialCountry: "us",
        preferredCountries: ['us'],
        autoPlaceholder: "polite",
        showSelectedDialCode: true,
        utilsScript: "./assets/js/utils.js",
        hiddenInput: () => ({
            phone: "full_phone"
        })
    });
    input.addEventListener("blur", function () {
        if (input.value.trim()) {
            if (iti.isValidNumber()) {
                input.parentElement.parentElement.classList.remove("error");
                input.parentElement.parentElement.querySelector(".error-txt").innerHTML = "";
            } else {
                input.parentElement.parentElement.classList.add("error");
                input.parentElement.parentElement.querySelector(".error-txt").innerHTML = "Invalid Number";
            }
        }
        if (input.value === "") {
            input.parentElement.parentElement.classList.remove("error");
            input.parentElement.parentElement.querySelector(".error-txt").innerHTML = "";
        }
    });
}
// intlTelInput JS End


// Work With Me Form Validation Js
$("#WorkWithMeForm").on("submit", function (e) {
    const fullname = $(this).find("[name='fullname']");
    const email = $(this).find("[name='email']");
    const phone = $(this).find("[name='phone']");
    const companyname = $(this).find("[name='companyname']");
    const projecttype = $(this).find("[name='projecttype']");
    const budgetrange = $(this).find("[name='budgetrange']");
    const projecttimeline = $(this).find("[name='projecttimeline']");
    const projectdetails = $(this).find("[name='projectdetails']");
    const grecaptchaResponse2 = grecaptcha.getResponse(1);
    let submit = true;

    if (fullname.val() == "") {
        fullname.parent().addClass("error");
        fullname.parent().find(".error-txt").html("This field is requried");
        submit = false;
    }

    if (email.val() == "") {
        email.parent().addClass("error");
        email.parent().find(".error-txt").html("This field is requried");
        submit = false;
    } else if (!checkEmailField1(email.val())) {
        email.parent().addClass("error");
        email.parent().find(".error-txt").html("Invalid email");
        submit = false;
    }

    if (phone.val() === "") {
        phone.parent().parent().addClass("error");
        phone.parent().parent().find(".error-txt").html("This field is required");
        submit = false;
    } else if (!iti.isValidNumber()) {
        phone.parent().parent().addClass("error");
        phone.parent().parent().find(".error-txt").html("Invalid number");
        submit = false;
    }

    if (companyname.val() == "") {
        companyname.parent().addClass("error");
        companyname.parent().find(".error-txt").html("This field is requried");
        submit = false;
    }

    if (projecttype.val() == "") {
        projecttype.parent().addClass("error");
        projecttype.parent().find(".error-txt").html("This field is requried");
        submit = false;
    }

    if (budgetrange.val() == "") {
        budgetrange.parent().addClass("error")
        budgetrange.parent().find(".error-txt").html("This field is requried")
        submit = false
    }

    if (projecttimeline.val() == "") {
        projecttimeline.parent().addClass("error");
        projecttimeline.parent().find(".error-txt").html("This field is requried");
        submit = false;
    }

    if (projectdetails.val() == "") {
        projectdetails.parent().addClass("error");
        projectdetails.parent().find(".error-txt").html("This field is requried");
        submit = false;
    }

    const recapcha2 = $(".input.recapcha2");

    if (!grecaptchaResponse2) {
        recapcha2.addClass("error");
        recapcha2.find(".error-txt").html("Please verify that you are human");
        submit = false;
    } else {
        captchaVerified2();
    }

    if (!submit) {
        e.preventDefault();
        $("form .primary-btn").attr("disabled", true);
    }
});

function captchaVerified2() {
    const recapcha2 = $(".input.recapcha2");
    recapcha2.removeClass("error");
    recapcha2.find(".error-txt").html("");
}


$("#WorkWithMeForm input").on("input", function () {
    $(this).parents(".input").removeClass("error");
    $(this).parents(".input").find(".error-txt").html("");
});

$("#WorkWithMeForm textarea").on("input", function () {
    $(this).parents(".input").removeClass("error");
    $(this).parents(".input").find(".error-txt").html("");
});

$("#WorkWithMeForm select").on("change", function () {
    $(this).parent().removeClass("error")
    $(this).parent().find(".error-txt").html("")
});

// email validation
document.querySelectorAll(".validate-email-one").forEach(element => {
    let filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    element.addEventListener("blur", function () {
        if (!filter.test(element.value)) {
            element.parentElement.classList.add("error")
            element.parentElement.querySelector(".error-txt").innerHTML = "Invalid Email";
        } else {
            element.parentElement.classList.remove("error")
            element.parentElement.querySelector(".error-txt").innerHTML = "";
        }
        if (element.value === "") {
            element.parentElement.classList.remove("error")
            element.parentElement.querySelector(".error-txt").innerHTML = "";
        }
    });
});

function checkEmailField1(val) {
    let isValid = true;
    if (
        !/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(val)
    ) {
        isValid = false;
    }
    return isValid;
}

const url = new URL(window.location.href);
const params = new URLSearchParams(url.search);
let status = params.get('status');
if (status === "done") {
    ToastifySuccess("Thank You, Your Message has been sent!");
    setTimeout(() => {
        const currentUrl = window.location.href;
        if (currentUrl.includes('?status=done')) {
            const updatedUrl = currentUrl.split('?status=done')[0];
            window.history.replaceState(null, '', updatedUrl);
        }
    }, 3000);
} else if (status === "error") {
    ToastifySuccess("Something Went Wrong!");
    setTimeout(() => {
        const currentUrl = window.location.href;
        if (currentUrl.includes('?status=error')) {
            const updatedUrl = currentUrl.split('?status=error')[0];
            window.history.replaceState(null, '', updatedUrl);
        }
    }, 3000);
}

function ToastifySuccess(message) {
    Toastify({
        text: message,
        duration: 3000,
        className: "success",
        close: true,
        style: {
            background: "#fff",
        },
    }).showToast();
}