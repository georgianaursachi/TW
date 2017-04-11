set serveroutput on;
<<global>>
DECLARE
v_contor NUMBER:=0;
v_recipie_name recipes.recipe_name%TYPE := 'Reteta';
v_method_of_preparation recipes.method_of_preparation%TYPE := 'Ca la mama acasa';
v_salt NUMBER;
v_sugar NUMBER;
v_fats NUMBER;
v_carbs NUMBER;
v_fiber NUMBER;
v_protein NUMBER;
v_calories NUMBER;
v_saturates NUMBER;


BEGIN
    delete from recipes;
    while(v_contor<100) loop
		v_contor:=v_contor+1;
		v_recipie_name := 'Reteta'||to_char(v_contor);
		v_salt := TRUNC(DBMS_RANDOM.VALUE(0,100), 3);
		v_sugar := TRUNC(DBMS_RANDOM.VALUE(0,100), 3);
		v_fats := TRUNC(DBMS_RANDOM.VALUE(0,100), 3);
		v_carbs := TRUNC(DBMS_RANDOM.VALUE(0,100), 3);
		v_fiber := TRUNC(DBMS_RANDOM.VALUE(0,100), 3);
		v_protein := TRUNC(DBMS_RANDOM.VALUE(0,100), 3);
		v_calories := TRUNC(DBMS_RANDOM.VALUE(0,100), 3);
		v_saturates := TRUNC(DBMS_RANDOM.VALUE(0,100), 3);
		
		
		insert into recipes (id, recipe_name, method_of_preparation, salt, sugar, fats, carbohydrate, fiber, protein, calories, saturates) values (v_contor,v_recipie_name,v_method_of_preparation,v_salt,v_sugar,v_fats, v_carbs,v_fiber, v_protein, v_calories, v_saturates);	
	end loop;
	       
END;
--SELECT * FROM RECIPES ORDER BY ID;