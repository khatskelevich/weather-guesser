CREATE EXTENSION if not exists tsm_system_rows; --only for superuser

drop function app.get_random_pair_of_cities();

create function app.get_random_pair_of_cities()
    returns table
            (
                id      int,
                city    text,
                state   text,
                country text
            )
    language plpgsql
as
$$
begin
    select t.city_id as id, t.name as city, t.state, t.country from app.cities t order by random() limit 2;
    -- "order by random()" works slow on huge datasets. Prefer to use TABLESAMPLE SYSTEM_ROWS(2);
    -- Here it's reasonable to use "order by random()".
end;
$$;

select * from app.get_random_pair_of_cities();