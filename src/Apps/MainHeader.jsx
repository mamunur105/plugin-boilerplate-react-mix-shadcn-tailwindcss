import React from "react";
import {Link, useLocation} from "react-router-dom";
import {
    NavigationMenu,
    NavigationMenuContent,
    NavigationMenuIndicator,
    NavigationMenuItem,
    NavigationMenuLink,
    NavigationMenuList,
    NavigationMenuTrigger,
    NavigationMenuViewport,
} from "@/components/ui/navigation-menu"
function MainHeader() {

    let { pathname } = useLocation();

    return (
        <>
            <NavigationMenu>
                <NavigationMenuList>
                    <NavigationMenuItem>
                        <Link to="/" className="border px-2 py-2 " > Settings </Link>
                    </NavigationMenuItem>
                    <NavigationMenuItem>
                        <Link to="/page" className="border px-2 py-2 " > Page </Link>
                    </NavigationMenuItem>
                </NavigationMenuList>
            </NavigationMenu>
        </>
    );
}

export default MainHeader;