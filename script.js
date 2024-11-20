const translations = {
    "Sandesh Sanjay Kamble": "संदेश संजय कांबळे",
    "Aspiring Developer | Code Explorer": "आकांक्षी डेव्हलपर | कोड एक्सप्लोरर",
    "Student Seeking Internship to Transform Ideas into Code": "कल्पना कोडमध्ये रूपांतरित करण्यासाठी इंटर्नशिप शोधणारा विद्यार्थी",
    "About": "माझ्याबद्दल",
    "Education": "शिक्षण",
    "Skills": "कौशल्ये",
    "Projects": "प्रकल्प",
    "Contact": "संपर्क",
    "About Me": "माझ्याबद्दल",
    "Enthusiastic Java Developer with hands-on experience in creating scalable backend solutions and designing engaging frontend interfaces. Adept in Java, HTML, CSS, and JavaScript, with a strong understanding of full-stack development. Seeking an opportunity to contribute to a collaborative team, build robust applications, and drive technological innovation through effective software development.": "स्केलेबल बॅकएंड सोल्यूशन्स तयार करण्यात आणि आकर्षक फ्रंटएंड इंटरफेस डिझाइन करण्यात प्रत्यक्ष अनुभव असलेला उत्साही जावा डेवलपर. जावा, HTML, CSS आणि जावास्क्रिप्टमध्ये प्रवीण, फुल-स्टॅक डेव्हलपमेंटची दृढ समज. सहयोगी टीममध्ये योगदान देण्यासाठी, मजबूत अॅप्लिकेशन्स तयार करण्यासाठी आणि प्रभावी सॉफ्टवेअर विकासाद्वारे तांत्रिक नवकल्पना चालवण्यासाठी संधी शोधत आहे.",
    "Download Resume": "रेझ्युमे डाउनलोड करा",
    "Bachelor of Science in Information Technology": "माहिती तंत्रज्ञानातील पदवीधर",
    "Mumbai University, Thane, India": "मुंबई विद्यापीठ, ठाणे, भारत",
    "Current: 3rd Semester": "सध्याचे: तिसरे सेमेस्टर",
    "Expected Completion: 2026": "अपेक्षित पूर्णत्व: २०२६",
    "GPA: 9.36/10.00 (Semester II)": "जीपीए: ९.३६/१०.०० (सेमेस्टर II)",
    "Java": "जावा",
    "JavaScript": "जावास्क्रिप्ट",
    "HTML/CSS": "एचटीएमएल/सीएसएस",
    "Python": "पायथन",
    "React": "रिअॅक्ट",
    "Node.js": "नोड.जेएस",
    "SQL": "एसक्यूएल",
    "Git": "गिट",
    "To-Do List Application": "कार्यसूची अॅप्लिकेशन",
    "Created a simple, intuitive to-do list with the ability to add, edit, and remove tasks. Implemented localStorage to save and persist user data across browser sessions.": "कार्ये जोडण्याची, संपादित करण्याची आणि काढून टाकण्याची क्षमता असलेली साधी, सहज समजणारी कार्यसूची तयार केली. ब्राउझर सत्रांमध्ये वापरकर्ता डेटा जतन करण्यासाठी आणि टिकवून ठेवण्यासाठी localStorage लागू केले.",
    "Quiz System": "प्रश्नमंजुषा प्रणाली",
    "Developed a quiz system allowing users to answer multiple-choice questions and receive instant feedback. Implemented managing question databases.": "वापरकर्त्यांना बहुपर्यायी प्रश्नांची उत्तरे देण्याची आणि त्वरित प्रतिसाद मिळवण्याची परवानगी देणारी प्रश्नमंजुषा प्रणाली विकसित केली. प्रश्न डेटाबेस व्यवस्थापित करणे लागू केले.",
    "Contact Me": "माझ्याशी संपर्क साधा",
    "Feel free to reach out to me for any inquiries:": "कोणत्याही चौकशीसाठी मला संपर्क करण्यास मोकळे रहा:",
    "Location: Kalyan, Maharashtra, India": "स्थान: कल्याण, महाराष्ट्र, भारत",
    "Your Name": "तुमचे नाव",
    "Your Email": "तुमचा ईमेल",
    "Subject": "विषय",
    "Your Message": "तुमचा संदेश",
    "Send Message": "संदेश पाठवा",
    "Quick Links": "जलद दुवे",
    "Contact Info": "संपर्क माहिती",
    "Follow Me": "मला अनुसरा",
    "Email: example@email.com": "ईमेल: example@email.com",
    "Phone: +91 1234567890": "फोन: +९१ १२३४५६७८९०",
    "© 2025 Sandesh Sanjay Kamble. All rights reserved.": "© २०२५ संदेश संजय कांबळे. सर्व हक्क राखीव.",
    "🌙☀️": "🌙☀️",
    "🌐 EN": "🌐 मराठी"
};

function toggleTheme() {
    document.body.classList.toggle('dark-mode');
    localStorage.setItem('theme', document.body.classList.contains('dark-mode') ? 'dark' : 'light');
}

function toggleLanguage() {
    currentLang = currentLang === 'en' ? 'hi' : 'en';
    translatePage();
    localStorage.setItem('lang', currentLang);
}

let currentLang = localStorage.getItem('lang') || 'en';

function translatePage() {
    document.querySelectorAll('[data-translate]').forEach(element => {
        const key = element.getAttribute('data-translate');
        if (element.tagName === 'INPUT' || element.tagName === 'TEXTAREA') {
            const placeholderKey = element.getAttribute('data-translate-placeholder');
            element.placeholder = currentLang === 'en' ? placeholderKey : (translations[placeholderKey] || placeholderKey);
        } else {
            element.textContent = currentLang === 'en' ? key : (translations[key] || key);
        }
    });
}

// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

// Apply saved theme
if (localStorage.getItem('theme') === 'dark') {
    document.body.classList.add('dark-mode');
}

// Initialize page
document.addEventListener('DOMContentLoaded', () => {
    translatePage();
});