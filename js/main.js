// + Department HEADER

document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".dropdown-btn").forEach(btn => {
        btn.addEventListener("click", function (e) {
            e.preventDefault(); // منع التنقل عند الضغط على الرابط

            let dropdown = this.nextElementSibling; // القائمة المرتبطة بهذا العنصر
            let icon = this.querySelector(".dropdown-icon"); // أيقونة +/-

            // إغلاق جميع القوائم الأخرى إذا كانت مفتوحة
            document.querySelectorAll(".dropdown-menu").forEach(menu => {
                if (menu !== dropdown) {
                    menu.classList.remove("show");
                    menu.previousElementSibling.querySelector(".dropdown-icon").textContent = "+";
                }
            });

            // تبديل الحالة بين الفتح والإغلاق
            if (dropdown.classList.contains("show")) {
                dropdown.classList.remove("show");
                icon.textContent = "+";
            } else {
                dropdown.classList.add("show");
                icon.textContent = "-";
            }
        });
    });

    // إغلاق القائمة عند النقر خارجها
    document.addEventListener("click", function (e) {
        if (!e.target.closest(".dropdown")) {
            document.querySelectorAll(".dropdown-menu").forEach(menu => {
                menu.classList.remove("show");
                menu.previousElementSibling.querySelector(".dropdown-icon").textContent = "+";
            });
        }
    });
});

// scroll-to-top

// تحديد زر الرجوع للأعلى
const scrollToTopBtn = document.getElementById("scrollToTopBtn");

// إظهار الزر عند التمرير لأسفل
window.addEventListener("scroll", function () {
    if (window.scrollY > 300) {
        scrollToTopBtn.classList.add("show");
    } else {
        scrollToTopBtn.classList.remove("show");
    }
});

// عند النقر على الزر، ارجع للأعلى بسلاسة
scrollToTopBtn.addEventListener("click", function () {
    window.scrollTo({
        top: 0,
        behavior: "smooth"
    });
});

