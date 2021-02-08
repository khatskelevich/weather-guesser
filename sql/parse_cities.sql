drop function parse_cities();

create function parse_cities() returns void
    language plpgsql
as
$$
declare
    v_json json;
begin
    select convert_from(bydata, 'UTF8')::json
    into v_json
    from app.temp;

    if v_json is not null
    then
        begin
            truncate app.cities;

            insert into app.cities
            select id, name, state, country
            from json_to_recordset(v_json)
                     as t(id numeric, name text, state text, country text, coord json);
        end;
    end if;
end
$$;


DO
$$
    BEGIN
        PERFORM parse_cities();
    END;
$$;