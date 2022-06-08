const mainTabs = document.querySelectorAll(".main_tabs .tabs li");
const mainContent = document.querySelectorAll(".main_tab_content");

mainTabs.forEach(tab => {
    tab.addEventListener("click", e => {
        // prevent anchor tag href default action
        e.preventDefault();

        removeActiveTab();
        addActiveTab(tab);
    });
});

const removeActiveTab = () => {
    mainTabs.forEach(tab => {
      tab.classList.remove("is_active");
    });
    mainContent.forEach(section => {
      section.classList.remove("is_active");
    });
  }
  
const addActiveTab = tab => {
    tab.classList.add("is_active");
    const href = tab.querySelector("a").getAttribute("href");
    const matchingSection = document.querySelector(href);
    matchingSection.classList.add("is_active");
}