const wrapper = document.querySelector(".wrapper");
        const fileName = document.querySelector(".file-name");
        const cancelBtn = document.querySelector("#cancel-btn");
        const defaultBtn = document.querySelector("#default-btn");
        const customBtn = document.querySelector("#custom-btn");
        const img = document.querySelector("img");
        let regExp = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;
        function defaultBtnActive(){
            defaultBtn.click();
        }
        defaultBtn.addEventListener("change",function(){
            const file = this.files[0];
            if(file){
                const reader = new FileReader();
                reader.onload = function(){
                    const result = reader.result;
                    img.src = result;
                    wrapper.classList.add("active");
                }
                reader.readAsDataURL(file);
                cancelBtn.addEventListener("click",function(){
                    wrapper.classList.remove("active");
                    img.src="";
                });
            }
            if(this.value){
                let valueStore = this.value.match(regExp);
                fileName.textContent = valueStore;
            }
        });

        Btn = document.querySelector(".image");
        Btn.onclick = ()=>{
            defaultBtnActive();
        }