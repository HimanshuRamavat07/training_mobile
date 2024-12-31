// import { ajaxRequest } from './ajax';
// import { Selectors, RequestKeys } from './enums';

// export function filter(): void {
//     const form = document.getElementById(Selectors.Form) as HTMLFormElement;
//     const url: string = form.getAttribute('action') ?? '';

//     const select1: string = (document.getElementById('select1') as HTMLSelectElement).value;
//     const select2: string = (document.getElementById('select2') as HTMLSelectElement).value;
//     const select3: string = (document.getElementById('select3') as HTMLSelectElement).value;

//     const data = new FormData();
//     data.append(RequestKeys.ModelName, select1);
//     data.append(RequestKeys.TechnologyName, select2);
//     data.append(RequestKeys.BrandName, select3);

//     // Call the ajax request
//     ajaxRequest(url, data);
// }

import { AjaxRequest } from './ajax';
import { Selectors, RequestKeys } from './enums';

export class Filter {
    private form: HTMLFormElement;
    private url: string;

    constructor() {
        this.form = document.getElementById(Selectors.Form) as HTMLFormElement;
        this.url = this.form.getAttribute('action') ?? '';
    }

    private getSelectValue(id: string): string {
        return (document.getElementById(id) as HTMLSelectElement).value;
    }

    private prepareFormData(): FormData {
        const data = new FormData();
        data.append(RequestKeys.ModelName, this.getSelectValue('select1'));
        data.append(RequestKeys.TechnologyName, this.getSelectValue('select2'));
        data.append(RequestKeys.BrandName, this.getSelectValue('select3'));
        return data;
    }

    public applyFilter(): void {
        const data = this.prepareFormData();
        const ajaxRequest = new AjaxRequest(this.url, data);
        ajaxRequest.sendRequest();
    }
}