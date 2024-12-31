// import { ajaxRequest } from './ajax';
import { AjaxRequest } from './ajax';
import { RequestKeys } from './enums';

export function jsPagination(data: string, model: string, technology: string, brandName: string): void {
    if (data === 'test')
        return;
    const id = `page${data}`;
    const url = (document.getElementById(id) as HTMLElement).getAttribute('atr') ?? '';

    const formData = new FormData();
    formData.append(RequestKeys.ModelName, model);
    formData.append(RequestKeys.TechnologyName, technology);
    formData.append(RequestKeys.BrandName, brandName);

    // Call the ajax request
    // ajaxRequest(url, formData);
    const ajaxRequest = new AjaxRequest(url, formData);
    ajaxRequest.sendRequest();
}