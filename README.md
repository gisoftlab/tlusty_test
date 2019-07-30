------------------------------------------------------------
  INSTALATION API PLATFORM WITH REACT-ADMIN ON LOCALMACHINE
------------------------------------------------------------

Create your own fork of this repository.

  1. docker-compose pull
  2. COMPOSE_HTTP_TIME=300 docker-compose up -d. 
  3. docker-compose exec php bin/console doctrine:schema:update --force. 
  4. docker-compose exec php bin/console doctrine:fixtures:load 
    
  -- PORT 80 has to be open. 

---------------------------------------------
  TEST TODO
---------------------------------------------
a. Add Component Order in React Admin 
  - React admin can't lost his possibility to dynamic changes from entity Order. 
    1. Make custom order List on React Admin  
    2. Make custom order Edit on React Admin
    3. Make custom order Create on React Admin
    4. Make custom order Index on React Admin
    5. Make custom order Show on React Admin

 - Commit changes 
 
b. Extend dashboard     
    1. Make custom Component to display orders. Fist 5 Orders with max Items  
    
- Commit changes
    
c. Extend Order List.

    1. Every order has to have drop down list with order items max 5. 
    2. Add button more to display more items
    3. Add possibility to create new Item to appropriate order
    4. Make promote in line (changeable)
    5. Make title in line (editable) 
    6. Make description in line (editable)
    7. Extend filter by range of created_at date + promoted

- Commit changes

d. Extend Order Edit.

    1. Add WYSIWYG for description field 
    2. Add Item list with possibility create edit delete
        
- Commit changes
        
e. Extend Order Create.

    1. Add WYSIWYG for description field

- Commit changes
    
f. Make custom CSS tyling 

    1. Add WYSIWYG for description field    
    
- Commit changes


Expected time to delivery max. 4 hours.

Due date: 24 hours from assigning.

