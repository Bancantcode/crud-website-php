const navToggle = document.getElementById('nav-toggle');
const navMenu = document.getElementById('nav__menu');
const navClose = document.getElementById('nav-close');

navToggle.addEventListener('click', function() 
{
    navMenu.style.left = '0';
});

navClose.addEventListener('click', function() 
{
    navMenu.style.left = '-250px';
});

const accordions = document.getElementsByClassName("faqs__accordion");

Array.from(accordions).forEach((accordion) => 
{
  const label = accordion.querySelector(".faqs__accordion-label");
  const content = accordion.querySelector(".faqs__accordion-content");

  content.style.setProperty("--content-height", content.offsetHeight + "px");

  function getState()
  {
    return accordion.getAttribute("data-accordion-state");
  }

  function setState(state) 
  {
    accordion.setAttribute("data-accordion-state", state);
  }

  setState("closed");

  label.addEventListener("click", () => 
  {
    const holdState = getState();

    closeAllAccordions();

    if (holdState === "closed") 
    {
      setState("opened");
    } 
    else 
    {
      setState("closed");
    }
  });
});

function closeAllAccordions() 
{
  Array.from(accordions).forEach((accordion) => 
  {
    accordion.setAttribute("data-accordion-state", "closed");
  });
}