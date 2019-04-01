
# Documentation   
See [Job Board](https://developers.greenhouse.io/job-board.html) for full documentation.           

1. Click on [Educations](https://developers.greenhouse.io/job-board.html#educations) in the left menu.     
1. Click on [List of Schools](https://developers.greenhouse.io/job-board.html#list-schools).    

This is the API endpoint you will use to GET matching results when a user types a minimum of 4 characters.
```   
GET https://boards-api.greenhouse.io/v1/boards/{board_token}/education/schools
```  

Our token is **romeopower**       

## Expectations    
See [wireframes](https://github.com/boxballoon/education_form_module/tree/master/docs/images/wireframes) for a visual.   

1. The user begins typing in the input field. They type the word "State".   
1. A select menu will appear below the input field containing all the matching results.
1. IF the user scrolls to the bottom of the results AND more results exist, load the next 100 results. Continue this until there are no more results (Lazy Load).      
1. The user will click one of the results.     
1. The NAME of the college will appear in the input field.    
1. When the form is submitted, the VALUE of this field should be the ID of the school NAME.    
1. Please comment all code and explain responsibilities of methods, functions, etc. 


## 'Nice To Have...Not A Need To Have'    

1. Styling to match wireframes.
1. Use [material icons](https://material.io/tools/icons/) for the search icon used in the wireframes.   
