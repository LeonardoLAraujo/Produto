import {LitElement,css, html} from "https://cdn.jsdelivr.net/gh/lit/dist@3/all/lit-all.min.js";
import "./esqueceu_senha.js";

/**
 * @export
 * @class Login
 * @typedef {Login}
 * @extends {LitElement}
 */
export class Login extends LitElement{

    /**
     * @method
     * @static
     * @override 
     */
    static get properties(){
        return{

        }
    }

    /***
     * @method
     * @override
     * @static
     */
    static get styles(){
        return css`
            #principal{
                width: 100%;
                height: 100vh;
                background-color: #082032;
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 140px;
            }

            #principal h1{
                color: #fff;
                margin-top: 2rem;
            }

            .principal__formulario{
                width: 70%;
                display: flex;
                flex-direction: column;
                gap: 13px;
                padding: 2rem;
                border-radius: 10px;
                background-color: #fff;
            }

            .principal__formulario h2{
                color: #082032;
                text-align: center;
            }

            .formulario__user,
            .formulario__password{
                padding: 0.8rem;
                border-radius: 20px;
                border: 1px solid #000;
            }

            .formulario__user:focus{
                border: none;
            }

            .formulario_esqueceuSenha{
                display: flex;
                justify-content: end;
            }

            .formulario_esqueceuSenha a{
                color: #082032;
                font-size: 14px;
                text-align: end;
                width: fit-content;
                justify-self: end;
            }

            .principal__formulario button{
                border-radius: 10px;
                background-color: #082032;
                color: #fff;
                border: none;
                padding: 0.8rem;
                font-size: 20px;
                cursor: pointer;
            }

            .modal{
                background-color: #ff6961;
                color: #fff;
                width: 100%;
                display: none;
                height: 100%;
                justify-content: center;    
                align-items: center;
            }

            .modal_2{
                background-color: #229A00;
                color: #fff;
                width: 100%;
                height: 100%;
                justify-content: center;    
                align-items: center;
                display: none;
            }

            .modalRedefinir{
                height: 100%;
                top: 0;
                width: 100%;
                position: absolute;
                display: none;
                backdrop-filter: blur(10px);
            }

            .fechar{
                width: 30px;
                height: 30px;
                background-color: #fff; 
                display: flex;
                justify-content: center;
                align-items: center;
                border-radius: 50%;
                position: absolute;
                margin-left: 20rem;
                margin-top: 8.5rem;
                cursor: pointer;
            }

            .fechar h1{
                color: #082032;
                font-size: 23px;
            }
        `;
    }


    /**
     * @constructor
     */
    constructor(){
        super();
        this.urlParams = new URLSearchParams(window.location.search);
        this.errorLogin = this.urlParams.get("login");
        this.successSenha = this.urlParams.get("success");
        this.stateMyModal = false;
    }   

    firstUpdated(){
        this.modal = this.shadowRoot?.querySelector(".modal");
        this.modalSuccess = this.shadowRoot?.querySelector(".modal_2");
        this.modalRedefinir = this.shadowRoot?.querySelector(".modalRedefinir");

        if(this.errorLogin != null){
            this.modal.style.display = "flex";
        }
        
        if(this.successSenha != null){
            this.modalSuccess.style.display = "flex";
            setTimeout(() => {
                this.modalSuccess.style.display = "none";
            }, 3000);
        }
    }

    /** 
     * @method
     * @override
    */
    render(){
        return html`
            <main id="principal">
                <h1>SEU SLOGAN</h1>
                <form action="../modal/verificandoUsuario.php" method="post" class="principal__formulario">
                    <h2>LOGIN</h2>
                    <input class="formulario__user" type="email" name="email" placeholder="E-mail" required>
                    <input class="formulario__password" type="password" name="password" placeholder="Senha" required>
                    <div class="formulario_esqueceuSenha">
                        <a href="#" @click=${() => {this.stateModal(); this.modalSenha()}}>Esqueceu a Senha?</a>
                    </div>
                    <button type="submit">Entrar</button>
                </form>
                <div class="modal">
                    <p>Informações Incorretas, tente Novamente!</p>
                </div>
                <div class="modal_2">
                    <p>Senha Alterada Com Sucesso!</p>
                </div>
            </main>

            <div class="modalRedefinir">
                <div class="fechar" @click=${this.fecharModal}>
                    <h1>X</h1>
                </div>
                <my-redefinir></my-redefinir>
            </div>
        `;
    }

    stateModal(){
        this.stateMyModal = !this.stateMyModal;
    }

    fecharModal(){
        this.stateMyModal = false;
        this.modalRedefinir.style.display = "none";
    }

    modalSenha(){
        if(this.stateMyModal){
            this.modalRedefinir.style.display = "block";
        }else{
            this.modalRedefinir.style.display = "none";
        }
    }

}

customElements.define("my-login", Login);