import {LitElement,css, html} from "https://cdn.jsdelivr.net/gh/lit/dist@3/all/lit-all.min.js";

/**
 * @export
 * @class EsqueceuSenha
 * @typedef {EsqueceuSenha}
 * @extends {LitElement}
 */
export class EsqueceuSenha extends LitElement{

    /**
     * @constructor
     */
    constructor(){
        super();
    }

    /**
     * @method
     * @override
     * @static
     */
    static get styles(){
        return css`
              #principal{
                width: 100%;
                height: 100vh;
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 140px;
                margin-top: 15rem;
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
                height: 100%;
                justify-content: center;    
                align-items: center;
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
                margin-left: 18rem;
                margin-top: -2.5rem;
            }

            .fechar h1{
                color: #082032;
                font-size: 23px;
            }
        `;
    }

    /**
     * @method
     * @override
     */
    render(){
        return html`
            <main id="principal">
                <form action="../modal/alterarSenhaUsuario.php" method="post" class="principal__formulario">
                    <h2>Esqueceu a Senha?</h2>
                    <input class="formulario__user" type="email" name="email" placeholder="E-mail" required>
                    <input class="formulario__password" type="password" name="password" placeholder="Senha" required>
                    <button type="submit">Redefirir Senha</button>
                </form>
            </main>
        `;
    }

}

customElements.define("my-redefinir", EsqueceuSenha);