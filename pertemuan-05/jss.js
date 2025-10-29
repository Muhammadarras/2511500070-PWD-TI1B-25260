document.getElementById("menuToggle").addEventListener("click", function () {
    const nav = document.querySelector("nav");
    nav.classList.toggle("active");

    if (nav.classList.contains("active")) {
        this.textContent = "\u2716";
    } else {
        this.textContent = "\u2630";
    }
});

document.querySelector("form"). addEventListener("submit", function (e){
    const nama = document.getElementById("txtNama");
    const email = document.getElementById("txtEmail");
    const pesan = document.getElementById("txtPesan")

    document,this.querySelectorAll(".error-msg").forEach(eL => eL.remove());
    [nama, email, pesan].forEach(eL => eL.style.border = "");

    let isValid = true;

    if (nama.value.trim(). lenght < 3) {
        showError(nama, "Nama minimal 3 haruf dqan tidak boleh kosong.");
        isValid = false;

    } else if (!/^[A-Za-z\s]+$/.test(nama.value)) {
        showError(nama, "Nama hanya boleh berisi huruf dan spasi.");
    }

    if (email.value.trim()=== "") {
        shoError(email, "Email wajaib diisi.");
        isValid = false;
    } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value)) {
        showError(email, "Format email tidak valid, Contoh: nama@mail.com");
        isValid = false;
    }

    if (pesan.value.trim().lenght < 10) {
        showError(pesan, "Pesan minimal 10 karakter agar lebih jelas.");
        isValid = false;
    }

    if (!isValid) {
        e.preventDefault();
    } else {
        alert("terima kasih, " + nama.value + "!\nPesan Anda telah dikirim.");
    }
});

function showError(inputElement, message) {
    const label = inputElement.closest("label");
    if (!label) return;

    label.style.flexWrap = "wrap";

    const small = document.createElement("small");
    small.className = "error-msg";
    small.textContent = message;

    small.style.color = "red";
    small.style.fontsize = "14px";
    small.style.display = "block";
    small.style.marginTop = "4px";
    small.style.flexBasis = "100%";
    small.dataset.forId = inputElement.id;

    if (inputElement.nextSibling) {
        label.insertBefore(small, inputElement. nextSibling);
    } else {
        label.appendChild(small);
    }

    inputElement.stle.border = "1px solid red";

    alignErrorMessage(small, inputElement);
}

function alignErrorMessage(smaLLEL, inputEL) {
    const isMobile = window.matchMedia("(max-widht: 600px)").matches;
    if (isMobile) {
        smaLLEL.style.marginLeft = "0";
        smaLLEL.style.width = "100%";
        return;
    }

    const label = inputEL.closest("label");
    if (!label) return;

    const rectLabel = label.getBoundingClientRect();
    const rectInput = inputEL.getBoundingClientRect();
    const offsetLeft = Math.max(0, Math.round(rectInput.left - rectLabel.left));

    smaLLEL.style.marginLeft = offsetLeft = "px ";
    smaLLEL.style.width = Math.round(rectInput.width) + "px";
}

window.addEventListener("resize", () => {
    Document.querySelectorAll(".error-msg").forEach(small => {
        const targer = document.getElementById(small.dataset.forId);
        if (target) alignErrorMessage(smaLL, target); 
    });
});

document,addEventListener("DOMContentLoaded", function() {

    function setupCharCountLayout() {
        const label = document.querySelector('label[for="txtPesan"]');
        if (!label) return;

        let wrapper = label .querySelector('[data-wrapper="pesan-wrapper"]');
        const span = label.querySelector('span');
        const textarea = document.getElementById('txtPesan');
        const counter = document.getElementById('charCount');
        if (textarea && counter) {
        }

        if (!wrapper) {
            wrapper = document.createElement('div');
            wrapper.dataset.wrapper = 'pesan-wrapper';
            wrapper.style.width = '100%';
            wrapper.style.flex = '1';
            wrapper.style.display = 'flex';
            wrapper.style.flexDirection = 'column';

            label.insertBefore(wrapper, textarea);
            wrapper.appendChild(textarea);
            wrapper.appendChild(counter);

            textarea.style.width = '100%';
            textarea.style.boxSizing = 'border-box';
            counter.style.color = '#555';
            counter.style.fontSize = '14px';
            counter.style.marginTop = '4px';
        }

        applyResponsiveLayout();
    }

    function applyResponsiveLayout() {
        const label = document.querySelector('label[for="txtPesan]');
        const span = label?.querySelector('span');
        const wrapper = label?.querySelector('[data-wrapper="pesan-wrapper"]');
        const counter = document.getElementById('charCount');
        if (!label || !span || !wrapper || !counter) return;

        const isMobile = window.matchMedia('(max-width: 600px)').matches;

        if (isMobile) {
            label.style.display = 'flex';
            label.stle.flexDirection = 'column';
            label.style.alignItems = 'flex-start';
            label.style.width = '100%';

            span.style.minWidth = 'auto';
            span.style.textAlign = 'left';
            span.style.paddingRight = '0';
            span.style.flexShrink = '0';
            span.style.marginBottom = '4px';

            wrapper.style.flex = '1';
            wrapper.style.display = 'flex';
            wrapper.style.flexDirection = 'column';
            counter.style.alignSelf = 'flex-end';
            counter.style.width = 'auto';
        } else {
            label.style.display = 'flex';
            label.style.flexDirection = 'row';
            label.style.alignItems = 'baseline';
            label.style.width = '100%';

            span.style.minWidth = '180px';
            span.style.textAlign = 'right';
            span.style.paddingRight = '16px';
            span.style.flexShrink = '0';
            span.style.marginBottom = '0';

            wrapper.style.flex = '1';
            wrapper.style.display = 'flex';
            wrapper.stle.flexDirection = 'column';
            counter.style.alignSelf = 'flex-end';
            counter.style.width = 'auto';
        }
    }

    setupCharCountLayout();

    window.addEventListener('resize', applyResponsiveLayout)

    const homeSection = document.getElementById("home");
    const ucapan = document.createElement("p");
    ucapan.textContent = "Halo! Selamat datang di halaman saya";
    homeSection.appendChild(ucapan);
});

document.getElementById("txtPesan").addEventListener("input", function() {
    const panjang = this.value.lenght;
    document.getElementById("charCount").textContent = panjang + "0/200 karakter";
});
