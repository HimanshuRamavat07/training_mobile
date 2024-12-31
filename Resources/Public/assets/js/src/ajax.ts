// import { Selectors } from './enums';
// import { showLoader, hideLoader } from './loader';

// export function ajaxRequest(url: string, data: FormData ): void {
//     const http = new XMLHttpRequest();
//     const responseData = document.getElementById(Selectors.TableData) as HTMLElement;

//     http.open('POST', url, true);
//     responseData.innerHTML = '';
//     showLoader();

//     http.onreadystatechange = function () {
//         if (http.readyState === 4 && http.status === 200) {
//             const template = document.createElement('template');
//             template.innerHTML = this.responseText;

//             const dataElement = template.content.querySelector('#'+Selectors.TableData);
//             if (dataElement) {
//                 responseData.innerHTML = dataElement.innerHTML;
//             } else {
//                 responseData.innerHTML = "<h2 class='text-center'>No data Found<h2>";
//             }
//             hideLoader();
//         }
//     };

//     http.onerror = function (e) { 
//         console.log(e); 
//         hideLoader(); 
//     };

//     http.send(data);
// }

import { Selectors } from './enums';
import { showLoader, hideLoader } from './loader';

export class AjaxRequest {
    private url: string;
    private data: FormData;
    private responseData: HTMLElement;

    constructor(url: string, data: FormData) {
        this.url = url;
        this.data = data;
        this.responseData = document.getElementById(Selectors.TableData) as HTMLElement;
    }

    public sendRequest(): void {
        const http = new XMLHttpRequest();
        http.open('POST', this.url, true);
        this.responseData.innerHTML = '';
        showLoader();

        http.onreadystatechange = () => {
            if (http.readyState === 4 && http.status === 200) {
                this.handleResponse(http.responseText);
                hideLoader();
            }
        };

        http.onerror = (e) => {
            console.log(e);
            hideLoader();
        };

        http.send(this.data);
    }

    private handleResponse(responseText: string): void {
        const template = document.createElement('template');
        template.innerHTML = responseText;

        const dataElement = template.content.querySelector('#' + Selectors.TableData);
        if (dataElement) {
            this.responseData.innerHTML = dataElement.innerHTML;
        } else {
            this.responseData.innerHTML = "<h2 class='text-center'>No data Found<h2>";
        }
    }
}