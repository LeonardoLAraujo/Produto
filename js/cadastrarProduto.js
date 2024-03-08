class Produto{

    constructor(){
        this.urlParams              = new URLSearchParams(window.location.search);
        this.errorCadastrar         = this.urlParams.get("sucesso");
        this.sucessoApagarProduto   = this.urlParams.get("success");
        this.alteradoSucesso        = this.urlParams.get("atualizado");
        this.modalCadastrado        = document.querySelector(".modalCadastrado");
        this.modalApagarProduto     = document.querySelector(".modalApagarProduto");
        this.modalAtualizarProduto  = document.querySelector(".modalAtualizarProduto");

        this.verificandoHashDeSucessoAoCadastrarProduto();
    }

    verificandoHashDeSucessoAoCadastrarProduto(){   
        if(this.errorCadastrar != null){
            this.modalCadastrado.style.display = "block";

            setTimeout(() => {
                this.modalCadastrado.style.display = "none";
            }, 3000);
            
        }

        if(this.sucessoApagarProduto != null){
            this.modalApagarProduto.style.display = "block";

            setTimeout(() => {
                this.modalApagarProduto.style.display = "none";
            }, 3000);
        }

        if(this.alteradoSucesso != null){
            this.modalAtualizarProduto.style.display = "block";

            setTimeout(() => {
                this.modalAtualizarProduto.style.display = "none";
            }, 3000);
        }
    }

}

let myProduto = new Produto();