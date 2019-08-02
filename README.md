The goal of this task is to verify your React.js programming skills, and see your general approach. Please follow instructions below. We want to see your ability to get along with API-Platform, connect React Admin to our APIs on API-Platform, your capability to create new custom components, adjust dashboard, lists and add css styling.

This task should not take you more than 1 evening. Previous experience with API-Platform project and React is a big plus.

ATTENTION: Your solution should customize React Admin on top of Hydra, without losing the connection to API Platform via Hydra. Other solutions will be DECLINED from evaluation process.

Due date: 24 hours from assigning.

Good luck!


----------------------------------------------------------------
  INSTALLATION OF API PLATFORM WITH REACT-ADMIN ON LOCALMACHINE
----------------------------------------------------------------

Create your own fork of this repository.

  1. docker-compose pull
  2. COMPOSE_HTTP_TIME=300 docker-compose up -d. 
  3. docker-compose exec php bin/console doctrine:schema:update --force. 
  4. docker-compose exec php bin/console doctrine:fixtures:load 
    
  -- PORT 80 has to be open. 


---------------------------------------------
Existing entities 
---------------------------------------------

1. Tables 
- Order
- OrderItem

2. Order Fields
 
 $id;
 $title;
 $short;
 $description;
 $promoted = false;
 $createdAt;
 $updatedAt;
 $items;

3. OrderItem Fields

 $id;
 $content;
 $description;
 $price = 0;
 $order;
 
 
---------------------------------------------
 TASK TODO 
---------------------------------------------

a. Add Component Order in React Admin 
  
    1. Make custom order List on React Admin  
    2. Make custom order Edit on React Admin
    3. Make custom order Create on React Admin
    4. Make custom order Index on React Admin
    5. Make custom order Show on React Admin

 - Commit changes 
 
 
b. Extend React Admin dashboard   

    1. Make custom Component to display orders. First 5 Orders with max Items  
    
- Commit changes
    
    
c. Extend Order List.

    1. Every order has to have drop down list with order items max 5. 
    2. Add button more to display more items
    3. Add possibility to create new Item to appropriate order
    4. Make promoted in line (changeable)
    5. Make title in line (editable) 
    6. Make description in line (editable)
    7. Extend filter by range of created_at date + promoted

- Commit changes


-------------- points below are not obligatory, but completing them is a big plus -------------------


d. Extend Order Edit.

    1. Add WYSIWYG for description field 
    2. Add Item list with possibility create edit delete
        
- Commit changes
        
e. Extend Order Create.

    1. Add WYSIWYG for description field

- Commit changes
    
f. Make custom CSS styling 

    1. Add WYSIWYG for description field    
    
- Commit changes


