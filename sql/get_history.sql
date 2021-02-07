drop function app.get_history(int);

create function app.get_history(p_user_id int) returns refcursor
    language plpgsql
as
$$
declare
    refcur refcursor = 'cursor';
begin
    open refcur for
        select *
        from games
        where user_id = p_user_id
        order by created_at DESC;
    return refcur;
end;
$$