
const addFolderBtn = document.querySelector(".add-folder"),
	addFilesBtn = document.querySelector(".add-file"),
	foldersPopUp = document.querySelector(".folder-popup"),
	filesPopUp = document.querySelector(".file-popup"),
	CopyPopUp = document.querySelector(".copy-popup"),
	closer = document.querySelectorAll(".close"),
  cardIcon = document.querySelectorAll(".card .bi-three-dots-vertical"),
  cardMenu = document.querySelectorAll(".card menu");
  

  cardIcon.forEach((item) => {
    item.addEventListener("click", (e) => {
      e.target.nextElementSibling.classList.toggle("show");
    });
  })

  function foldersToggler() {
    foldersPopUp.classList.toggle("none");
  }
  function filesToggler() {
    filesPopUp.classList.toggle("none");
  }
  addFolderBtn.addEventListener("click", foldersToggler);
  addFilesBtn.addEventListener("click", filesToggler);
  closer.forEach((item) => {
    item.addEventListener("click", (e) => {
      e.target.parentElement.parentElement.classList.toggle("none");
    });
  })
