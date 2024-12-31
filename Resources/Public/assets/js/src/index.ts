// import { filter } from './filter';
import { Filter } from './filter';
import { jsPagination } from './pagination';
import { Selectors, RequestKeys } from './enums';

// Attach the filter event to the button
const form = document.getElementById(Selectors.FilterButton) as HTMLElement;
// form.addEventListener('click', filter);
const filterInstance = new Filter(); // Create an instance of Filter
form.addEventListener('click', () => filterInstance.applyFilter()); // Use an arrow function


const resetButton = document.getElementById(Selectors.ResetButton) as HTMLElement;
resetButton.addEventListener('click', function () {
    location.reload();
});

// Attach the pagination event to the button
jsPagination('test', RequestKeys.ModelName, RequestKeys.BrandName, RequestKeys.TechnologyName);