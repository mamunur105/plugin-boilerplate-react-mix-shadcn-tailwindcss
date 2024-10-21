import React, { useState, useEffect } from 'react';
import { Badge } from "@/components/ui/badge";
import {HashRouter, Navigate, Route, Routes} from "react-router-dom";
import SettingsPage from "@/Apps/SettingsPage";
import Page from "@/Apps/Page";

const App = () => {
    return (
        <>
            <HashRouter>
                <Routes>
                    <Route path="/" element={<SettingsPage/>}/>
                    <Route path="/page" element={<Page/>}/>
                    <Route path="*" element={<Navigate to="/" replace/>}/>
                </Routes>
            </HashRouter>
        </>
    );
};
export default App;